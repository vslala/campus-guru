<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Notification;
use DB;
use App\SendMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MessageController extends Controller {
    public function _construct(){
        $this->middleware("auth");
    }

	public function messages(){
        $notifications = Notification::where("n_to", Auth::user()->username)->get();
        $messages = DB::table("send_messages")
            ->leftJoin('display_pictures', 'send_messages.sender_username', '=', 'display_pictures.username')
            ->select(['send_messages.reciever_username', 'send_messages.sender_username', 'send_messages.id',
                'send_messages.subject', 'send_messages.message', 'send_messages.created_at',
                'display_pictures.image_name','display_pictures.image_url'
                ])
            ->where(['send_messages.reciever_username'=> Auth::user()->username])
            ->orderBy("send_messages.created_at", "desc")
            ->get();

        $totalMessage = count($messages);
//        $messages = SendMessage::where(['reciever_username'=>Auth::user()->username])->get();
        return view("message.index", compact('messages','totalMessage','notifications'));
    }

    public function single($id){
        Notification::where(["n_id_of"=>$id, "n_to"=>Auth::user()->username])->delete();
        $notifications = Notification::where("n_to", Auth::user()->username)->get();
        $message = SendMessage::find($id);
        return view('message.single', compact('message', 'notifications'));
    }

    public function sent(){
        $notifications = Notification::where("n_to", Auth::user()->username)->get();
        $messages = $messages = DB::table("send_messages")
            ->leftJoin('display_pictures', 'send_messages.reciever_username', '=', 'display_pictures.username')
            ->select(['send_messages.reciever_username', 'send_messages.sender_username', 'send_messages.id',
                'send_messages.subject', 'send_messages.message', 'send_messages.created_at',
                'display_pictures.image_name','display_pictures.image_url'
            ])
            ->where(['send_messages.sender_username'=>Auth::user()->username])
            ->orderBy("send_messages.created_at", "desc")
            ->get();

        $totalMessageSent = count($messages);
        return view("message.sent", compact('messages', 'totalMessageSent', 'notifications'));
    }

    public function compose(){
        $notifications = Notification::where("n_to", Auth::user()->username)->get();
        return view('message.compose', compact('notifications'));
    }

    public function delete($id){
        $flag = SendMessage::find($id)->delete();
        if($flag){
            return Redirect::back()->with("flash_message", 'Deleted Successfully!!!');
        }else{
            return Redirect::back()->with("flash_message", 'Could not delete this message!!!');
        }
    }

}
