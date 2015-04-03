<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionTag extends Model {

	protected $table = 'question_tags';

    public function addTags($tags, $qId){

        try{
            for($i=0;$i < count($tags); $i++)
            {
                $tag = new QuestionTag();
                $tag->q_id = $qId;
                $tag->tag = $tags[$i];
                $tag->save();
            }

            return true;
        } catch(\PDOException $ex)
        {
            return false;
        }

    }

}
