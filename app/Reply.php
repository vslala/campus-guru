<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reply extends Model {

    protected $table = "replies";

    public function addReply($dId, $reply, $username)
    {
        $a = new Reply();
        $a->username = $username;
        $a->d_id = $dId;
        $a->reply = $reply;
        $flag = $a->save();

        if($flag){
            $discussionBelongsTo = Discussion::where("id", $dId)->get(["username"]);
            $replies = Reply::where(["d_id"=>$dId])->groupBy("username")->get();
            $n = new Notification();
            foreach($replies as $r){
                $n->addNotification($r->username,$username, 21, $dId);
            }
            return $a->reply;
        }
        else
            return false;
    }

}
