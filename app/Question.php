<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	protected $table = "questions";

    public function attachments()
    {
        return $this->hasMany('App\Attachment');
    }
    public function addQuestion($username,$title,$content, $category)
    {
        $q = new Question();
        $q->username = $username;
        $q->title = $title;
        $q->description = $content;
        $q->category = $category;
        $q->save();
        return $q->id;
    }

}
