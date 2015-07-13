<?php namespace App\Http\Controllers;

use App\Blog;
use App\BlogComment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Notification;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BlogView;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller {

    public function showAllBlogs(){
        $blogs = DB::table("blogs")
            ->leftJoin("display_pictures", "blogs.username", "=", "display_pictures.username")
            ->select(["blogs.id","blogs.username","blogs.heading","blogs.content","blogs.created_at",
                "display_pictures.image_name","display_pictures.image_url"
            ])
            ->get();
        if(Auth::guest()){
            $show=false;
            $setBlogActive = 'active';
        }else{
            $notifications = Notification::where("n_to", Auth::user()->username)->get();
            $show=true;
        }
//        dd($blogs);
        return view('home.showAllBlogs', compact('blogs','notifications','show','setBlogActive'));
    }

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
            $blogViews = Blog::where(["id"=>$id])->first();
            $blogViews->views += 1;
            $blogViews->save();
            $total_views = $blogViews->views;
            return view('home.showBlog', compact('blog','userComments','total_views'));

        } else{
            /*
         * Increment Blog Views
         */
            $blogViews = Blog::where(["id"=>$id])->first();
            if(Auth::user()->username != $blogViews->username){
                $blogViews->views += 1;
                $blogViews->save();
            }

//            if(count($blogViews) == 0 || count($blogViews) == NULL){
//                $b = new BlogView();
//                $b->blog_id = $id;
//                $b->username = Session::get('username');
//                $b->total_views = 1;
//                if($b->save()){
//                    $total_views = $b->totalViews($id);
//                }else {
//                    $total_views = $b->totalViews($id);
//                    return view('home.showBlog', compact('blog','userComments','total_views','username','cookie'));
//                }


            }

        $total_views = $blogViews->views;

        if(! isset(Auth::user()->username))
            $username = null;
        else
            $username = Auth::user()->username;
//        dd($blog);
        return view('home.showBlog', compact('blog','userComments','total_views','username'));
    }

}
