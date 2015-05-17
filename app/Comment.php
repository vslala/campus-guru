<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
            $answer = new Answer();
            $answerRow = $answer->where(["id"=>$answerID])->get();
            $q_id = $answerRow[0]->q_id;
            if($answerRow[0]->username !== $username){
                $n = new Notification();
                $n->n_to = $answerRow[0]->username;
                $n->n_by = $username;
                $n->n_for = 4;
                $n->n_id_of = $q_id;
                $n->save();
            }
            $commentAll = new Comment();
            $commentAll = $commentAll->where("ans_id", $answerID)->groupBy("username")->get();
            foreach($commentAll as $c){
                if($c->username == $username){
                    continue;
                }else{
                    $n = new Notification();
                    $n->n_to = $c->username;
                    $n->n_by = $username;
                    $n->n_for = 41;
                    $n->n_id_of = $q_id;
                    $n->save();
                }

            }
            return true;
        } else {
            return false;
        }
    }

}
