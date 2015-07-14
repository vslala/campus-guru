<?php namespace App\Http\Controllers;

use App\Category;
use App\Discussion;
use App\DislikedDiscussion;
use App\DisplayPicture;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LikedDiscussion;
use App\Notification;
use App\Reply;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DiscussionController extends Controller {

    public function __construct(){
//        $this->middleware('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if(Auth::guest()){
            return Redirect::back();
        }

        $notifications = Notification::where("n_to", Auth::user()->username)->get();
        $categories = Category::all();
		return view('discussion.start', compact('categories', 'notifications'));
	}

    function multiexplode ($delimiters,$string) {

        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
        /*
         * Form Input validation
         */
        $v = $this->validate($request, [
            'title' => 'required|max:500',
            'category' => 'required',
            'description' => 'required',
            'tags' => 'required'
        ]);
		if($request->isMethod("put"))
        {
            $title = $request->get("title");
            $tags = $request->get("tags");
            $category = $request->get("category");
            $description = $request->get("description");

            $tagArray = $this->multiexplode([",","|"," "], $tags);
            $d = new Discussion();
            $flag = $d->addDiscussion(Auth::user()->username, $title,$description,$category, $tagArray);

            if($flag)
                return redirect(route("viewAllDiscussion"));
            else
                return Redirect::back()->with("flash_message", "Tags are not inserted into the database.");
        }
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storeReply(Request $request)
	{
        /*
         * Form Input validation
         */
        $v = $this->validate($request, [
            'd_id' => 'required',
            'reply' => 'required|max:9999'
        ]);
        if($request->ajax())
        {
            $username = Auth::user()->username;
            $d_id = $request->get('d_id');
            $reply = $request->get('reply');
            $d = new Reply();
            $thisReply = $d->addReply($d_id, $reply, $username);

            if($thisReply)
            {
                $image = new DisplayPicture();
                $image = $image->where("username", $username)->get()->toArray();
                $imageUrl = $image[0]['image_url'];
                $imageName = $image[0]['image_name'];

                $response = ["imageUrl"=>$imageUrl, "imageName"=>$imageName, "reply"=>$thisReply];
                $response = json_encode($response);
                return $response;

            }
            else
                return false;
        }

        if($request->isMethod('put'))
        {
            $username = Auth::user()->username;
            $d_id = $request->get('d_id');
            $reply = $request->get('reply');
            $q = new Reply();
            $flag = $q->addReply($d_id, $reply, $username);

            if($flag){
                $n_to = $request->get("n_to");
                $n_for = 2;
                $n_by = Auth::user()->username;
                $n_id_of_discussion = $d_id;
                if($n_by == $n_to){
                    return Redirect::back();
                }else{
                    $n = new Notification();
                    $n->addNotification($n_to,$n_by,$n_for,$n_id_of_discussion);
                }
                return Redirect::back();
            }

            else
                return false;
        }
    }


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        // delete the notification of the corresponding discussion
        $username = NULL;
        $n = new Notification();
        if(!Auth::guest()) {
            $n->where(["n_to" => Auth::user()->username, "n_id_of" => $id, "n_for" => 2])->delete();
            $n->where(["n_to" => Auth::user()->username, "n_id_of" => $id, "n_for" => 21])->delete();
            $notifications = Notification::where("n_to", Auth::user()->username)->get();
            $username = Auth::user()->username;
            $image = DisplayPicture::where("username", Auth::user()->username)->get();
        }else{
            $setDiscussionsActive = 'active';
        }
        $likes = LikedDiscussion::all();
        $dislikes = DislikedDiscussion::all();
        $discussion = Discussion::find($id);

        //fetching al answers with their user image
        $replies = DB::table('replies')
            ->leftJoin('display_pictures', 'replies.username', '=', 'display_pictures.username')
            ->select('replies.id', 'replies.d_id','replies.username','replies.reply','replies.created_at',
                'display_pictures.image_name','display_pictures.image_url'
            )
            ->get();
//        dd($replies);

        return view('discussion.single', compact('discussion','replies','image','likes','dislikes','notifications', 'username', 'setDiscussionsActive'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showAll()
	{
        if(Auth::guest()){
            $setDiscussionsActive = 'active';
            $show = false;
        }else{
            $show = true;
            $notifications = Notification::where("n_to", Auth::user()->username)->get();
        }
        $discussions = DB::table("discussions")
            ->leftJoin("display_pictures", "discussions.username", "=","display_pictures.username")
            ->select(['discussions.id','discussions.title','display_pictures.image_url','display_pictures.image_name'])
            ->get();
//        dd($discussions);
        return view('discussion.all', compact('discussions','notifications','show', 'setDiscussionsActive'));
	}

    public function showAllByUsername()
    {
        $notifications = Notification::where("n_to", Auth::user()->username)->get();
        $discussions = Discussion::where("username",Auth::user()->username)->get();
        return view("discussion.userDiscussions", compact('discussions', 'notifications'));
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

    public function recentlyStartedDiscussions()
    {
        $response = DB::table("discussions")
            ->leftJoin("display_pictures", "discussions.username", "=","display_pictures.username")
            ->take(8)
            ->select(['discussions.id','discussions.title','display_pictures.image_url','display_pictures.image_name'])
            ->orderBy("discussions.created_at", "desc")
            ->get();

        return json_encode($response);
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Discussion::find($id)->delete();
        return Redirect::back()->with("flash_message", "Discussion with id: ". $id ." has been deleted successfully!");
	}

}
