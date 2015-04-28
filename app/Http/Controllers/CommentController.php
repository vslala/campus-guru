<?php namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
	public function show($id)
	{
		//
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
