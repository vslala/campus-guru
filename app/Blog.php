<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model {

	protected $table = "blogs";

    public function createBlog($username,$heading,$content)
    {
        $blog = new Blog();
        $blog->username = $username;
        $blog->heading = $heading;
        $blog->content = $content;
        $flag = $blog->save();

        if($flag)
            return true;
        else
            return false;
    }

}
