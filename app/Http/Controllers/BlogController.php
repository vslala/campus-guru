<?php namespace App\Http\Controllers;

use App\BlogComment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller {

	public function addBlogComment(Request $request){
        /*
         * Form Input validation
         */
        $v = $this->validate($request, [
            'blogComment' => 'required|min:3',
            'blogID' => 'required',
        ]);

        if($request->isMethod("POST")){
            if($request->ajax()){
                $comment = $request->get("blogComment");
                $blogID = $request->get("blogID");
                $username = Auth::user()->username;

                $bc = new BlogComment();
                $flag = $bc->addComment($username,$blogID,$comment);

                if($flag){
                    $userComments = DB::table("blog_comments")
                        ->leftJoin("display_pictures","blog_comments.username", "=", "display_pictures.username")
                        ->select([
                            'blog_comments.id','blog_comments.username','blog_comments.comment','blog_comments.created_at',
                            'display_pictures.image_url','display_pictures.image_name'
                        ])
                        ->where("blog_comments.blog_id",$blogID)
                        ->orderBy("blog_comments.created_at", "desc")
                        ->take(1)
                        ->get();
                    return json_encode($userComments);
                }
            }
        }
    }

}
