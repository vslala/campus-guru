<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model {

	protected $table = "suggestions";

    public function addSuggestion($username, $suggestion){
        $s = new Suggestion();
        $s->username = $username;
        $s->suggestion = $suggestion;
        $flag = $s->save();
        if($flag){
            return true;
        } else {
            return false;
        }
    }

}
