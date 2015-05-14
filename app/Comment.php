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
            $answer = new Answer();
            $answerRow = $answer->where(["id"=>$answerID])->get();
            $q_id = $answerRow[0]->q_id;
            $n = new Notification();
            $n->n_to = $answerRow[0]->username;
            $n->n_by = $username;
            $n->n_for = 4;
            $n->n_id_of = $q_id;
            $n->save();

            $commentAll = new Comment();
            $commentAll = $commentAll->where("ans_id", $answerID)->distinct()->get();
            foreach($commentAll as $c){
                $n = new Notification();
                $n->n_to = $c->username;
                $n->n_by = $username;
                $n->n_for = 41;
                $n->n_id_of = $q_id;
                $n->save();
            }
            return true;
        } else {
            return false;
        }
    }

}
