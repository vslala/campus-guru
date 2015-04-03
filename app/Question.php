<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	protected $table = "questions";

    public function addQuestion($username,$title,$content, $category, $imageName,$imageUrl,$imageSize,$imageType)
    {
        $q = new Question();
        $q->username = $username;
        $q->title = $title;
        $q->description = $content;
        $q->category = $category;
        $q->image_name = $imageName;
        $q->image_type = $imageType;
        $q->image_url = $imageUrl;
        $q->image_size = $imageSize;
        $q->save();
        return $q->id;
    }

}
