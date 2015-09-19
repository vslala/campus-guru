<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model {

    protected $table = "replies";

    public function addReply($dId, $reply, $username)
    {
        $a = new Reply();
        $a->username = $username;
        $a->d_id = $dId;
        $a->reply = $reply;
        $flag = $a->save();

        if($flag)
            return $a->reply;
        else
            return false;
    }

}
