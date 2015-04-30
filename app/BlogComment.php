<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model {

	protected $table = "blog_comments";

    public function addComment($username,$blogID, $comment){
        $bc = new BlogComment();
        $bc->username = $username;
        $bc->blog_id = $blogID;
        $bc->comment = $comment;

        if($bc->save()){
            return true;
        } else {
            return false;
        }
    }

}
