<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

	protected $table = "answers";

    public function addAnswer($qId, $answer, $username)
    {
        $a = new Answer();
        $a->username = $username;
        $a->q_id = $qId;
        $a->answer = $answer;
        $flag = $a->save();

        if($flag)
            return $a->answer;
        else
            return false;
    }

}
