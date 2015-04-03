<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	protected $table = "comments";

    public function addComment($username, $answerID, $comment)
    {
        $c = new Comment();
        $c->ans_id = $answerID;
        $c->comment = $comment;
        $c->username = $username;
        $flag = $c->save();

        if($flag)
        {
            return true;
        } else {
            return false;
        }
    }

}
