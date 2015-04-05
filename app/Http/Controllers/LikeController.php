<?php namespace App\Http\Controllers;

use App\DislikedAnswer;
use App\DislikedDiscussion;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LikedDiscussion;
use DB;
use App\LikedAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function storeLikes($qId,$ansId)
	{
        $l = new LikedAnswer();
        $likes = $l->where(['username'=>Auth::user()->username, 'q_id'=>$qId, "ans_id"=>$ansId])->get();
        if(count($likes) <= 0)
        {
            $l->username = Auth::user()->username;
            $l->q_id = $qId;
            $l->ans_id = $ansId;
            $l->save();
        }
        $likes = $l->where(['q_id'=>$qId, "ans_id"=>$ansId])->get();
        $count = count($likes);

//            dd($count);
            if($count)
                return $count;
            else
                return false;
	}

    public function storeDislikes($qId,$ansId)
    {
        $l = new DislikedAnswer();
        $dislikes = $l->where(['username'=>Auth::user()->username, 'q_id'=>$qId, "ans_id"=>$ansId])->get();
        if(count($dislikes) <= 0)
        {
            $l->username = Auth::user()->username;
            $l->q_id = $qId;
            $l->ans_id = $ansId;
            $l->save();
        }
        $dislikes = $l->where(['q_id'=>$qId, "ans_id"=>$ansId])->get();
        $count = count($dislikes);

        return $count;
    }

    public function storeLikesDiscussion($dId,$repId)
    {
        $l = new LikedDiscussion();
        $likes = $l->where(['username'=>Auth::user()->username, 'd_id'=>$dId, "rep_id"=>$repId])->get();
        if(count($likes) <= 0)
        {
            $l->username = Auth::user()->username;
            $l->d_id = $dId;
            $l->rep_id = $repId;
            $l->save();
        }
        $likes = $l->where(['d_id'=>$dId, "rep_id"=>$repId])->get();
        $count = count($likes);

//            dd($count);
        if($count)
            return $count;
        else
            return false;
    }

    public function storeDislikesDiscussion($dId,$repId)
    {
        $l = new DislikedDiscussion();
        $dislikes = $l->where(['username'=>Auth::user()->username, 'd_id'=>$dId, "ans_id"=>$repId])->get();
        if(count($dislikes) <= 0)
        {
            $l->username = Auth::user()->username;
            $l->d_id = $dId;
            $l->rep_id = $repId;
            $l->save();
        }
        $dislikes = $l->where(['d_id'=>$dId, "rep_id"=>$repId])->get();
        $count = count($dislikes);

        return $count;
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
