<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model {

	protected $table = "discussions";

    public function addDiscussion($username,$title,$description, $category, $tags)
    {
        $d = new Discussion();
        $d->username = $username;
        $d->title = $title;
        $d->description = $description;
        $d->category = $category;
        $d->save();

        $tagArray = $this->multiexplode([",","|"," "], $tags);
//                        dd($tagArray);
        // instantiating new object for the tags
        $tag = new DiscussionTag();
        $flag = $tag->addTags($tags, $d->id);
        if($flag)
            return true;
        else
            return false;
    }
    private function multiexplode ($delimiters,$string) {

        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }

}
