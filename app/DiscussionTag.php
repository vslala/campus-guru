<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussionTag extends Model {

    protected $table = 'discussion_tags';

    public function addTags($tags, $dId){

        try{
            for($i=0;$i < count($tags); $i++)
            {
                $tag = new DiscussionTag();
                $tag->d_id = $dId;
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
