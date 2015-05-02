<?php namespace App\Http\Controllers;

use App\Answer;
use App\Blog;
use App\BlogView;
use App\Complain;
use App\Confession;
use App\Discussion;
use App\DisplayPicture;
use App\LikedAnswer;
use App\Profile;
use App\Question;
use App\SendMessage;
use App\Status;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
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
            ->take(5)
            ->orderBy('blogs.created_at','desc')
            ->get();
        $randomIndex = array_rand($blog, 1);
        $blog = $blog[$randomIndex];

//        dd($blog);
        // status in descending order
        $status = DB::table('statuses')
            ->leftJoin('display_pictures', 'statuses.username', '=', 'display_pictures.username')
            ->take(5)
            ->orderBy('statuses.created_at', 'desc')
            ->get(['statuses.id', 'statuses.username', 'statuses.status',
                'display_pictures.image_name','display_pictures.image_url',
                'statuses.likeCount', 'statuses.dislikeCount', 'statuses.created_at', 'statuses.updated_at'
            ]);
        $questions = DB::table("questions")
            ->leftJoin("display_pictures", "questions.username", "=","display_pictures.username")
            ->select(['questions.id','questions.title','display_pictures.image_url','display_pictures.image_name'])
            ->get();
        $discussions = DB::table("discussions")
            ->leftJoin("display_pictures", "discussions.username", "=","display_pictures.username")
            ->select(['discussions.id','discussions.title','display_pictures.image_url','display_pictures.image_name'])
            ->get();
        $mostLikedStatus = Status::whereRaw('likeCount = (select max(`likeCount`) from statuses)')->get()->toArray();

        $mostLikedImage = DisplayPicture::whereRaw('likeCount = (select max(`likeCount`) from display_pictures)')->get()->toArray();

        $complains = Complain::take(5)->orderBy('created_at', 'desc')->get(['complain', 'college', 'created_at']);

        $confessions = Confession::take(5)->orderBy('created_at', 'desc')->get(['confession', 'college', 'created_at']);

        $randomUsers = DB::table("users")
            ->leftJoin("display_pictures", "users.username", "=", "display_pictures.username")
            ->select(['users.id','users.name','users.username','users.created_at','display_pictures.image_name','display_pictures.image_url'])
            ->get();
        $users = $randomUsers;
        $randomUser = array_rand($randomUsers,1);
        $randomUser = $randomUsers[$randomUser];

        $mliIndex = array_rand($mostLikedImage, 1);
        $mostLikedImage = $mostLikedImage[$mliIndex];
//        dd($randomUser->username);
//        dd($questions);
//        dd($status[0]->image_url);
        if(isset($status)){
            foreach($status as $s)
            {
                if($s->image_url == null or $s->image_url == '')
                    $s->image_url = 'http://fc09.deviantart.net/fs71/f/2010/330/9/e/profile_icon_by_art311-d33mwsf.png';
            }
        }

//        dd($mostLikedStatus);

		return view('home', compact('status','questions','blog','discussions', 'users',
            'mostLikedStatus', 'complains', 'confessions', 'mostLikedImage', 'randomUser'));
	}

    public function profile()
    {
        $totalLikes = count(LikedAnswer::where("username", Auth::user()->username)->get());
        $questionAsked = count(Question::where("username", Auth::user()->username)->get());
        $questionAnswered = count(Answer::where("username", Auth::user()->username)->get());
        $posts = count(Status::where("username", Auth::user()->username)->get());
        $realName = Auth::user()->name;
        $user = Profile::where("username", Auth::user()->username)->get()->toArray();
        $userImage = DisplayPicture::where("username",  Auth::user()->username)->get()->toArray();
        $status = Status::where('username',  Auth::user()->username)->get();
        $discussionStarted = count(Discussion::where("username", Auth::user()->username)->get());

        if(count($userImage) <= 0){
            $userImage[0]['image_url'] = 'http://fc09.deviantart.net/fs71/f/2010/330/9/e/profile_icon_by_art311-d33mwsf.png';
            $userImage[0]['image_name'] = "No image";
        }


        return view('home.profile', compact("user","userImage","status", 'totalLikes', 'questionAsked',
            'posts', 'questionAnswered', 'realName', 'discussionStarted'));
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
                $message = "Profile has been updated successfully!";
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
        /*
         * Form Input validation
         */
        $v = $this->validate($request, [
            'status' => 'required|min:2',
        ]);
        if($request->ajax())
        {
            // For Put Request
            $status = $request->get("status");
            $s = new Status();
            $flag = $s->createStatus(Auth::user()->username, $status);

            if($flag)
            {
                $status = DB::table('statuses')
                    ->leftJoin('display_pictures', 'statuses.username', '=', 'display_pictures.username')
                    ->orderBy('statuses.created_at', 'desc')
                    ->take(5)
                    ->get(['statuses.id', 'statuses.username', 'statuses.status',
                'display_pictures.image_name','display_pictures.image_url',
                'statuses.likeCount', 'statuses.dislikeCount', 'statuses.created_at', 'statuses.updated_at'
                    ]);
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

    //Delete Status
    public function deleteStatus($id){
        Status::find($id)->delete();
        return Redirect::back()->with("flash_message", "Status with id: ". $id ." has been deleted successfully!");
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
        /*
         * Form Input validation
         */
        $v = $this->validate($request, [
            'heading' => 'required|max:500',
            'content' => 'required|max:3000',
        ]);


        /*
         * if the form inputs are valid then proceed below
         */
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
        /*
         * Form Input validation
         */
        $v = $this->validate($request, [
            'heading' => 'required|max:500',
            'content' => 'required|max:3000',
        ]);

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

    public function profileVisit($username)
    {
        $realName = User::where("username",$username)->get(['name','username','created_at']);
        $user = Profile::where("username", $username)->get()->toArray();
        $userImage = DisplayPicture::where("username", $username)->get()->toArray();
        $totalLikes = count(LikedAnswer::where("username", $username)->get());
        $questionAsked = count(Question::where("username", $username)->get());
        $questionAnswered = count(Answer::where("username", $username)->get());
        $posts = count(Status::where("username", $username)->get());
        $status = Status::where("username", $username)->get();
        $discussionStarted = count(Discussion::where("username", $username)->get());

        if(count($userImage) <= 0){
            $userImage[0]['image_url'] = 'http://fc09.deviantart.net/fs71/f/2010/330/9/e/profile_icon_by_art311-d33mwsf.png';
            $userImage[0]['image_name'] = "No image";
        }
//        dd($userImage);

        return view('home.profileVisit', compact('user','realName', 'userImage', 'totalLikes',
            'questionAsked','status', 'questionAnswered', 'posts', 'discussionStarted'));
    }

    public function sendMessage(Request $request){
        /*
         * Form Input validation
         */
//        $v = $this->validate($request, [
//            'sentTo' => 'required|max:500|min:2',
//            'message' => 'required|max:3000',
//            'subject' => 'required|min:8'
//        ]);
        if($request->isMethod("post")){
            if($request->ajax()){
                $sender = Auth::user()->username;
                $reciever = $request->get("sentTo");
                $message = $request->get("message");
                $subject = $request->get("subject");
                if($request->file('file')->getClientSize() > 0){
                    $file = $request->file('file');
                    $fileUrl = "files/".Auth::user()->username ."/" .$file->getClientOriginalName();
                    $m = new SendMessage();
                    $flag = $m->sendMessage($sender,$reciever,$subject,$message,$file->getClientOriginalName(),$fileUrl);
                    if($flag){
                        return "Message sent successfully!";
                    }else{
                        return "Error sending the message!";
                    }
                }
            }else {

                $fileUrl = NULL;
                $sender = Auth::user()->username;
                $reciever = $request->get("sentTo");
                $subject = $request->get("subject");
                $message = $request->get("message");
                if ($request->hasFile("file")) {
                    $file = $request->file("file");
                    $fileUrl = "files";
                    $m = new SendMessage();
                    $flag = $m->sendMessage($sender, $reciever, $subject, $message, $file->getClientOriginalName(), $fileUrl);
                    if ($flag) {
                        $file->move($fileUrl, $file->getClientOriginalName());
                        return Redirect::back()->with("flash_message", "Message has been sent successfully!");
                    } else {
                        return Redirect::back()->with("flash_message", "Error Sending message!!");
                    }
                }

                $m = new SendMessage();
                $flag = $m->sendMessage($sender, $reciever, $subject, $message);
                if ($flag) {
                    return Redirect::back()->with("flash_message", "Message has been sent successfully!");
                } else {
                    return Redirect::back()->with("flash_message", "Error Sending message!!");
                }
            }


        }
    }



    public function showAllBlogs(){
        $blogs = DB::table("blogs")
            ->leftJoin("display_pictures", "blogs.username", "=", "display_pictures.username")
            ->select(["blogs.id","blogs.username","blogs.heading","blogs.content","blogs.created_at",
                "display_pictures.image_name","display_pictures.image_url"
            ])
            ->get();

//        dd($blogs);
        return view('home.showAllBlogs', compact('blogs'));
    }

    // View All Status
    public function viewAllStatus()
    {
        $status = DB::table('statuses')
            ->leftJoin('display_pictures', 'statuses.username', '=', 'display_pictures.username')
            ->orderBy('statuses.created_at', 'desc')
            ->get(['statuses.id', 'statuses.username', 'statuses.status',
                'display_pictures.image_name','display_pictures.image_url',
                'statuses.likeCount', 'statuses.dislikeCount', 'statuses.created_at', 'statuses.updated_at'
            ]);
        return view('home.statusAll', compact('status'));
    }

}
