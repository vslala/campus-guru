<?php namespace App\Http\Controllers;

use App\Answer;
use App\Blog;
use App\DisplayPicture;
use App\LikedAnswer;
use App\Profile;
use App\Question;
use App\Status;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use League\Flysystem\Exception;
use PDO;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        //latest blog
//        DB::setFetchMode(PDO::FETCH_ASSOC);
        $blog = DB::table("blogs")
            ->leftJoin("display_pictures", "blogs.username","=","display_pictures.username")
            ->select(['blogs.id', 'blogs.username','blogs.heading', 'blogs.created_at', 'display_pictures.image_url', 'display_pictures.image_name'])
            ->take(1)
            ->orderBy('blogs.created_at','desc')
            ->get();
//        dd($blog);
        // status in descending order
        $status = DB::table('statuses')
            ->join('display_pictures', 'statuses.username', '=', 'display_pictures.username')
            ->take(5)
            ->orderBy('statuses.created_at', 'desc')
            ->get();
        $questions = DB::table("questions")
            ->leftJoin("display_pictures", "questions.username", "=","display_pictures.username")
            ->select(['questions.id','questions.title','display_pictures.image_url','display_pictures.image_name'])
            ->get();
        $discussions = DB::table("discussions")
            ->leftJoin("display_pictures", "discussions.username", "=","display_pictures.username")
            ->select(['discussions.id','discussions.title','display_pictures.image_url','display_pictures.image_name'])
            ->get();
//        dd($questions);
//        dd($status);
		return view('home', compact('status','questions','blog','discussions'));
	}

    public function profile()
    {
        $totalLikes = count(LikedAnswer::where("username", Auth::user()->username)->get());
        $questionAsked = count(Question::where("username", Auth::user()->username)->get());
        $questionAnswered = count(Answer::where("username", Auth::user()->username)->get());
        $posts = count(Status::where("username", Auth::user()->username)->get());
        $user = new Profile();
        $dp = new DisplayPicture();
        $status = new Status();
        $u = new User();
        $p = $user->where("username", Auth::user()->username)->get()->toArray();
        $dp = $dp->where("username", Auth::user()->username)->get()->toArray();
        $status = $status->where("username", Auth::user()->username)->get();
        $user = $u->where("username", Auth::user()->username)->get()->toArray();
//        dd($p);
        return view('home.profile', compact("p","dp","status","user", 'totalLikes', 'questionAsked', 'posts', 'questionAnswered'));
    }
    public function editProfile(Request $request)
    {
        if($request->isMethod("put"))
        {
            $aboutMe = $request->get("aboutMe");
            $email = $request->get("email");
            $mobile = $request->get("mobile");
            $dob = $request->get("dob");
            $rashi = $request->get("rashi");
            $state = $request->get("state");
            $city = $request->get("city");
            $website = $request->get("website");

            $user = new Profile();
            $flag = $user->checkProfile(Auth::user()->username, $aboutMe, $email,$mobile,$dob,$rashi,$state,$city,$website);
            if($flag)
            {
                $message = "Profile has been update successfully!";
                return $message;
            }
        }

        if($request->ajax())
        {
            $aboutMe = $request->get("aboutMe");
            $email = $request->get("email");
            $mobile = $request->get("mobile");
            $dob = $request->get("dob");
            $rashi = $request->get("rashi");
            $state = $request->get("state");
            $city = $request->get("city");
            $website = $request->get("website");

            $user = new Profile();
            $flag = $user->addProfile(Auth::user()->username, $aboutMe, $email,$mobile,$dob,$rashi,$state,$city,$website);
            if($flag)
            {
                $message = "Profile has been update successfully!";
                return $message;
            }
        }
    }

    public function home()
    {
        return view('home.home');
    }

    public function uploadDP(Request $request)
    {
        if($request->isMethod("put"))
        {

            if($request->file("file")->isValid())
            {
//                dd($request->file("file"));
                $file = $request->file("file");
                $imageType = $file->getClientMimeType();
//                dd($imageType);
                $validImageType = ["image/jpeg","image/jpg","image/png"];
                if(in_array($imageType, $validImageType))
                {
                    $imageName = $file->getClientOriginalName();
                    $imageSize = $file->getClientSize();
                    $imageUrl = "images/" . Auth::user()->username . "/" . $imageName;

                    // instantiating an object form DisplayPicture Class
                    $image = new DisplayPicture();
                    $flag = $image->check(Auth::user()->username,$imageName,$imageType,$imageUrl,$imageSize);

                    if($flag)
                    {
                        $imageUrl = Auth::user()->username;
                        $dir = "images/" . $imageUrl;
                        $file->move($dir, $imageName);
                        return redirect(route("profile"));
                    }
                }
            }
        }
    }

    public function statusUpdate(Request $request)
    {
        if($request->ajax())
        {
            // For Put Request
            $statuses = $request->get("status");
            $s = new Status();
            $flag = $s->createStatus(Auth::user()->username, $statuses);

            if($flag)
            {
                $status = DB::table('statuses')
                    ->join('display_pictures', 'statuses.username', '=', 'display_pictures.username')
                    ->orderBy('statuses.created_at', 'desc')
                    ->get();
                $status = json_encode($status);

                return $status;
            } else {
                return "Some Error!";
            }


        }
        if($request->isMethod("put"))
        {
            // For Put Request
            $status = $request->get("status");
            $s = new Status();
            $flag = $s->createStatus(Auth::user()->username, $status);

            if($flag)
            {
                $message = "The status has been updated Successfully!!!";
                return redirect(route("home"))->with("flash_message", $message);
            } else {
                $message = "There was some problem posting the status!!!";
                return redirect(route("home"))->with("flash_message", $message);
            }
        }

        if($request->ajax())
        {
            // For Ajax Response
            $status = $request->get("status");
            $s = new Status();
            $flag = $s->createStatus(Auth::user()->username, $status);

            if($flag)
            {
                $message = "The status has been updated Successfully!!!";
                return $message;
            } else {
                $message = "There was some problem posting the status!!!";
                return $message;
            }
        }
    }

    public function blog()
    {
        $blog = new Blog();
        $image = new DisplayPicture();
        $image = $image->where("username",Auth::user()->username )->get(['image_url', 'image_name'])->toArray();
        $blog = $blog->where("username", Auth::user()->username)->get();
        return view('home.blog', compact('blog', 'image'));
    }

    public function composeBlog()
    {
        return view('home.compose');
    }
    public function createBlog(Request $request)
    {
        if($request->isMethod("put"))
        {
            $heading = $request->get("heading");
            $content = $request->get('content');
            $blog = new Blog();
            $flag = $blog->createBlog(Auth::user()->username, $heading, $content);
            if($flag)
                return redirect(route("blog"));
            else
                return redirect(route("blog"))->with("flash_message", "Some Error posting the blog!");
        }
    }
    /*
     * Get Method for blogEdit
     */
    public function blogEdit($id)
    {
        $blog = Blog::find($id);
        return view("home.edit", compact('blog'));
    }
    /*
     * get method for blog edit
     */
    public function blogUpdate($id, Request $request)
    {
        $blog = Blog::find($id);
        $blog->heading = $request->get("heading");
        $blog->content = $request->get("content");
        $blog->save();
        return redirect(route('blog'));
    }

    public function blogDelete($id)
    {
        Blog::find($id)->delete();
        return redirect(route('blog'));
    }

    public function latestBlog()
    {
        $response = DB::table("blogs")
            ->leftJoin("display_pictures", "blogs.username","=","display_pictures.username")
            ->select(['blogs.id', 'blogs.username','blogs.heading', 'blogs.created_at', 'display_pictures.image_url', 'display_pictures.image_name'])
            ->take(1)
            ->orderBy('desc')
            ->get();

        return json_encode($response);


    }

}
