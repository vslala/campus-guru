<?php namespace App\Http\Controllers;

use App\DisplayPicture;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function show($id)
    {
        $question = new Question();
        $question = $question->find($id);
        return view('question.single', compact('question'));
    }
	public function showQuestionsByUsername()
	{
        $questions = new Question();
        $questions = $questions->where("username", Auth::user()->username)->get();
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
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
