<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogView extends Model {

	protected $table = "blog_views";

    public function totalViews($blogID){
        return count(BlogView::where('blog_id', $blogID)->get());
    }



}
