<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogView extends Model {

	protected $table = "blog_views";

    public function incrementViews($blogID, $username = null){
        $blogViews = BlogView::where("blog_id", $blogID)->first();
        if(count($blogViews) <= 0){
            $b = new BlogView();
            $b->blog_id = $blogID;
            $b->total_views = 1;
            if($b->save()){
                return true;
            }else {
                return false;
            }
        }
        $total_views = $blogViews->total_views;
        $blogViews->total_views = intval($total_views) + 1;
        if($blogViews->save()){
            return $blogViews->total_views;
        }
        return $total_views;
    }



}
