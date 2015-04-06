<?php namespace App\Http\Controllers;

use App\DislikedAnswer;
use App\DislikedDiscussion;
use App\DislikedStatus;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LikedDiscussion;
use App\LikedStatus;
use App\Status;
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

    public function updateLikeStatus($id)
    {
        $l = new LikedStatus();
        $liked = $l->where(['username'=>Auth::user()->username, 'status_id'=>$id])->get();
        if(count($liked) <= 0)
        {
            $l->username = Auth::user()->username;
            $l->status_id = $id;
            $l->save();

            $lc = Status::find($id);
            $likeCount = $lc->likeCount;
            $likeCount++;
            $lc->likeCount = $likeCount;
            $lc->save();
        }
        $likeCount = new Status();
        $count = $likeCount->where("id", $id)->get(['likeCount'])->toArray();
        $count = $count[0]['likeCount'];

        return $count;

    }
    public function updateDislikeStatus($id)
    {
        $dl = new DislikedStatus();
        $disliked = $dl->where(['username'=>Auth::user()->username, 'status_id'=>$id])->get();
        if(count($disliked) <= 0)
        {
            $dl->username = Auth::user()->username;
            $dl->status_id = $id;
            $dl->save();

            $d = Status::find($id);
            $dislikeCount = $d->dislikeCount;
            $dislikeCount++;
            $d->dislikeCount = $dislikeCount;
            $d->save();
        }
        $dislikeCount = new Status();
        $count = $dislikeCount->where("id", $id)->get(['dislikeCount'])->toArray();
        $count = $count[0]['dislikeCount'];

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
