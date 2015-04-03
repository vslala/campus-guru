<?php namespace App\Http\Controllers;

use App\Answer;
use App\Comment;
use App\DislikedAnswer;
use App\DisplayPicture;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LikedAnswer;
use DB;
use App\Question;
use App\QuestionTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class QuestionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('question.ask');
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
        if($request->isMethod('put'))
        {
            $title = $request->get('title');
            $category = $request->get('category');
            $content = $request->get('content');

            if($request->file('file')->isValid())
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

                    $q = new Question();
                    $q_id = $q->addQuestion(Auth::user()->username,$title,$content,$category,$imageName,$imageUrl,$imageSize,$imageType);

                    if($q_id)
                    {
                        $tags = $request->get("tags");
                        $tagArray = $this->multiexplode([",","|"," "], $tags);
//                        dd($tagArray);
                        $q_tags = new QuestionTag();
                        $flag = $q_tags->addTags($tagArray, $q_id);
                        if($flag)
                            return redirect(route('allQuestions'));
                        else
                            return Redirect::back()->with("flash_message", "Tags are not inserted into the database.");
                    }
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
                return Redirect::back();
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
        $likes = new LikedAnswer();
        $likes = $likes->get();
        $dislikes = new DislikedAnswer();
        $dislikes = $dislikes->get();
        $question = new Question();
        $question = $question->find($id);
        //fetching al answers with their user image
        $answers = DB::table('answers')
            ->leftJoin('display_pictures', 'answers.username', '=', 'display_pictures.username')
            ->select('answers.id', 'answers.q_id','answers.username','answers.answer','answers.created_at','display_pictures.image_name','display_pictures.image_url')
            ->get();
        // fetch all comments with their user image
        $comments = DB::table('comments')
            ->leftJoin('display_pictures', 'comments.username', '=', 'display_pictures.username')
            ->select('comments.id', 'comments.ans_id','comments.comment','comments.username','comments.created_at','display_pictures.image_name','display_pictures.image_url')
            ->get();
//        dd($comments);
//        dd($answers);
        $image = DisplayPicture::where("username", Auth::user()->username)->get();
        return view('question.single', compact('question','answers','image', 'comments','likes','dislikes'));
    }
	public function showQuestionsByUsername()
	{
        $questions = new Question();
        $questions = $questions->where("username", Auth::user()->username)->get();
//        dd($questions);
        $image = new DisplayPicture();
        $image = $image->where("username", Auth::user()->username)->get()->toArray();
		return view('question.userQuestions', compact('questions', 'image'));
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
            ->take(5)
            ->select(['questions.id','questions.title','display_pictures.image_url','display_pictures.image_name'])
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
        $questions = DB::table("questions")
            ->leftJoin("display_pictures", "questions.username", "=","display_pictures.username")
            ->select(['questions.id','questions.title','display_pictures.image_url','display_pictures.image_name'])
            ->get();
//        dd($questions);
		return view('question.all', compact('questions'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}



}
