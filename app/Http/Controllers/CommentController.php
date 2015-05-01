<?php namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use DB;

class CommentController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        /*
         * Form Input validation
         */
        $v = $this->validate($request, [
            'ansId' => 'required',
            'comment' => 'required|min:3',
        ]);
		if($request->isMethod("put"))
        {
            if($request->ajax()){
                $answerID = $request->get('ansId');
                $comment = $request->get('comment');
                $c = new Comment();
                $flag = $c->addComment(Auth::user()->username, $answerID, $comment);
                if($flag)
                    return $this->fetchAnswerComments($answerID);
                else
                    return "There was some error adding the comment";
            }

            $answerID = $request->get('ansId');
            $comment = $request->get('comment');
            $c = new Comment();
            $flag = $c->addComment(Auth::user()->username, $answerID, $comment);
            if($flag)
                return Redirect::back()->with("flash_message", "Your comment has been added.");
            else
                return Redirect::back()->with("flash_message", "There was some error while adding comment.");
        }




	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function fetchAnswerComments($id)
	{
        $comments = DB::table('comments')
            ->leftJoin('display_pictures', 'comments.username', '=', 'display_pictures.username')
            ->where('comments.ans_id', $id)
            ->select('comments.id', 'comments.ans_id','comments.comment','comments.username',
                'comments.created_at','display_pictures.image_name','display_pictures.image_url')
            ->orderBy('comments.created_at', 'desc')
            ->take(1)
            ->get();

        return json_encode($comments);
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
