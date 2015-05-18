<?php namespace App\Http\Controllers;

use App\BlogComment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BlogView;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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

    public function showBlog($id){
        $blog = DB::table("blogs")
            ->leftJoin("display_pictures", "blogs.username", "=", "display_pictures.username")
            ->where(["blogs.id"=>$id])
            ->select(["blogs.id","blogs.username","blogs.heading","blogs.content","blogs.created_at",
                "display_pictures.image_name","display_pictures.image_url"
            ])
            ->get();
        $userComments = DB::table("blog_comments")
            ->leftJoin("display_pictures","blog_comments.username", "=", "display_pictures.username")
            ->select([
                'blog_comments.id','blog_comments.username','blog_comments.comment', 'blog_comments.created_at',
                'display_pictures.image_url','display_pictures.image_name'
            ])
            ->where("blog_comments.blog_id",$id)
            ->orderBy("blog_comments.created_at", "asc")
            ->get();

        if(Auth::guest()){
            $b = new BlogView();
            $b->blog_id = $id;
            $b->username = "visitor_".uniqid();
            $b->total_views = 1;
            if($b->save()){
                $total_views = $b->totalViews($id);
            }else{
                $total_views = $b->totalViews($id);
                return view('home.showBlog', compact('blog','userComments','total_views','username','cookie'));
            }
        } else{
            /*
         * Increment Blog Views
         */
            $blogViews = BlogView::where(["blog_id"=>$id, 'username'=>Session::get('username')])->first();
            if(count($blogViews) == 0 || count($blogViews) == NULL){
                $b = new BlogView();
                $b->blog_id = $id;
                $b->username = Session::get('username');
                $b->total_views = 1;
                if($b->save()){
                    $total_views = $b->totalViews($id);
                }else {
                    $total_views = $b->totalViews($id);
                    return view('home.showBlog', compact('blog','userComments','total_views','username','cookie'));
                }


            }
        }

        $b = new BlogView();
        $total_views = $b->totalViews($id);

        if(! isset(Auth::user()->username))
            $username = null;
        else
            $username = Auth::user()->username;
//        dd($blog);
        return view('home.showBlog', compact('blog','userComments','total_views','username'));
    }

}
