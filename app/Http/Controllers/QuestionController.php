<?php namespace App\Http\Controllers;

use App\Answer;
use App\Attachment;
use App\Category;
use App\Comment;
use App\DislikedAnswer;
use App\DisplayPicture;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LikedAnswer;
use App\Notification;
use DB;
use App\Question;
use App\QuestionTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class QuestionController extends Controller {

    public function __construct(){
//        $this->middleware('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $notifications = Notification::where("n_to", Auth::user()->username)->get();
        $categories = Category::all();
		return view('question.ask', compact('categories', 'notifications'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
    function multiexplode ($delimiters,$string) {

        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }
	public function create(Request $request)
	{
        /*
         * Form Input validation
         */
        $v = $this->validate($request, [
            'title' => 'required|max:500',
            'category' => 'required',
            'content' => 'required',
            'tags' => 'required'
        ]);


        $q = new Question();
        if($request->isMethod('put'))
        {
            $title = $request->get('title');
            $category = $request->get('category');
            $content = $request->get('content');

            if($request->hasFile('file')) //if the file is valid
            {
                $file = $request->file('file');
                if($file->getClientMimeType() == 'exe')
                    return redirect(route('userQuestions'))->with("flash_message", "This file type is not allowed.");
                else
                {
                    $imageName = $file->getClientOriginalName();
                    $imageType = $file->getClientMimeType();
                    $imageSize = $file->getClientSize();
                    $dir = "images/" . Auth::user()->username . "/attachments";
                    $imageUrl = $dir . "/" . $imageName;

                    // saving the question in the database
                    $q_id = $q->addQuestion(Auth::user()->username,$title,$content,$category);

                    if($q_id)
                    {
//                        dd($imageName. " " . $imageSize ." " . $imageType. " " . $imageUrl);
                        // instantiating the object of for the attachment.
                        $f = new Attachment();
                        $flag = $f->addFile($q_id,$imageName,$imageSize,$imageType,$imageUrl);
                        if($flag)
                        {
                            $file->move($dir, $imageName);
                        }
                        // saving the tags inserted by the user
                        $tags = $request->get("tags");
                        $tagArray = $this->multiexplode([",","|"," "], $tags);
//                        dd($tagArray);
                        // instantiating new object for the tags
                        $q_tags = new QuestionTag();
                        $flag = $q_tags->addTags($tagArray, $q_id);
                        if($flag)
                            return redirect(route('viewAllQuestions'));
                        else
                            return Redirect::back()->with("flash_message", "Tags are not inserted into the database.");
                    }
                }
            } else {
                // saving the question into the database
                $q_id = $q->addQuestion(Auth::user()->username,$title,$content,$category);
                if($q_id)
                {
                    $tags = $request->get("tags");
                    $tagArray = $this->multiexplode([",","|"," "], $tags);
//                        dd($tagArray);
                    $q_tags = new QuestionTag();
                    $flag = $q_tags->addTags($tagArray, $q_id);
                    if($flag)
                        return redirect(route('viewAllQuestions'));
                    else
                        return Redirect::back()->with("flash_message", "Tags are not inserted into the database.");
                }
            }
        }
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function addAnswer(Request $request)
	{
        /*
         * Form Input validation
         */
        $v = $this->validate($request, [
            'q_id' => 'required',
            'answer' => 'required|min:3'
        ]);
		if($request->ajax())
        {
            $username = Auth::user()->username;
            $q_id = $request->get('q_id');
            $answer = $request->get('answer');
            $q = new Answer();
            $thisAnswer = $q->addAnswer($q_id, $answer, $username);

            if($thisAnswer)
            {
                $image = new DisplayPicture();
                $image = $image->where("username", $username)->get()->toArray();
                $imageUrl = $image[0]['image_url'];
                $imageName = $image[0]['image_name'];

                $response = ["imageUrl"=>$imageUrl, "imageName"=>$imageName, "answer"=>$thisAnswer];
                $response = json_encode($response);
                return $response;

            }
            else
                return false;
        }

        if($request->isMethod('put'))
        {
            $username = Auth::user()->username;
            $q_id = $request->get('q_id');
            $answer = $request->get('answer');
            $q = new Answer();
            $flag = $q->addAnswer($q_id, $answer, $username);

            if($flag)
            {
                $n_to = $request->get("n_to");
                $n_for = 1;
                $n_by = Auth::user()->username;
                $n_id_of_question = $q_id;
                if($n_by == $n_to){
                    return Redirect::back();
                }else{
                    $n = new Notification();
                    $n->addNotification($n_to,$n_by,$n_for,$n_id_of_question);
                }

                return Redirect::back();
            }
            else
                return false;
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function show($id)
    {
        $username = NULL;
        // delete the notification of the corresponding question
        $n = new Notification();
        if(!Auth::guest()) {
            $n->where(["n_to" => Auth::user()->username, "n_id_of" => $id, "n_for" => 1])->delete();
            $n->where(["n_to" => Auth::user()->username, "n_id_of" => $id, "n_for" => 4])->delete();
            $n->where(["n_to" => Auth::user()->username, "n_id_of" => $id, "n_for" => 41])->delete();
            $notifications = Notification::where("n_to", Auth::user()->username)->get();
            $username = Auth::user()->username;
            $image = DisplayPicture::where("username", $username)->get();
        }

        $likes = new LikedAnswer();
        $likes = $likes->get();
        $dislikes = new DislikedAnswer();
        $dislikes = $dislikes->get();
        $question = new Question();
        $question = $question->find($id);
        $attachment = Attachment::where("q_id", $id)->get();
        if(count($attachment) <= 0)
            $attachment = null;
//        dd($attachment);
        //fetching al answers with their user image
        $answers = DB::table('answers')
            ->leftJoin('display_pictures', 'answers.username', '=', 'display_pictures.username')
            ->select('answers.id', 'answers.q_id','answers.username','answers.answer','answers.created_at',
                'display_pictures.image_name','display_pictures.image_url'
            )
            ->get();
        // fetch all comments with their user image
        $comments = DB::table('comments')
            ->leftJoin('display_pictures', 'comments.username', '=', 'display_pictures.username')
            ->select('comments.id', 'comments.ans_id','comments.comment','comments.username','comments.created_at','display_pictures.image_name','display_pictures.image_url')
            ->get();
//        dd($comments);
//        dd($answers);

        return view('question.single', compact('question','answers','image', 'comments','likes',
            'dislikes', 'attachment', 'notifications', 'username'));
    }
	public function showQuestionsByUsername()
	{
        $notifications = Notification::where("n_to", Auth::user()->username)->get();
        $questions = new Question();
        $questions = $questions->where("username", Auth::user()->username)->get();
//        dd($questions);
        $image = new DisplayPicture();
        $image = $image->where("username", Auth::user()->username)->get()->toArray();
		return view('question.userQuestions', compact('questions', 'image', 'notifications'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function recentlyAskedQuestions()
	{
        $response = DB::table("questions")
            ->leftJoin("display_pictures", "questions.username", "=","display_pictures.username")
            ->take(8)
            ->select(['questions.id','questions.title','display_pictures.image_url','display_pictures.image_name'])
            ->orderBy("questions.created_at", "desc")
            ->get();

        return json_encode($response);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function viewAllQuestions()
	{
        $notifications = Notification::where("n_to", Auth::user()->username)->get();
        $questions = DB::table("questions")
            ->leftJoin("display_pictures", "questions.username", "=","display_pictures.username")
            ->select(['questions.id','questions.title','display_pictures.image_url','display_pictures.image_name'])
            ->get();
//        dd($questions);
		return view('question.all', compact('questions','notifications'));
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Question::find($id)->delete();
        return Redirect::back()->with("flash_message", 'Question with id: '.$id.' Deleted Successfully!!!');
	}



}
