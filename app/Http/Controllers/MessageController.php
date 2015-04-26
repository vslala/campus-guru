<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        $messages = DB::table("send_messages")
            ->join('display_pictures', 'send_messages.reciever_username', '=', 'display_pictures.username')
            ->select(['send_messages.reciever_username', 'send_messages.sender_username', 'send_messages.id',
                'send_messages.subject', 'send_messages.message', 'send_messages.created_at',
                'display_pictures.image_name','display_pictures.image_url'
                ])
            ->where(['send_messages.reciever_username'=> Auth::user()->username])
            ->get();

        $totalMessage = count($messages);
//        $messages = SendMessage::where(['reciever_username'=>Auth::user()->username])->get();
        return view("message.index", compact('messages','totalMessage'));
    }

    public function single($id){
        $message = SendMessage::find($id);
        return view('message.single', compact('message'));
    }

    public function sent(){
        $messages = $messages = DB::table("send_messages")
            ->join('display_pictures', 'send_messages.sender_username', '=', 'display_pictures.username')
            ->select(['send_messages.reciever_username', 'send_messages.sender_username', 'send_messages.id',
                'send_messages.subject', 'send_messages.message', 'send_messages.created_at',
                'display_pictures.image_name','display_pictures.image_url'
            ])
            ->where(['send_messages.sender_username'=>Auth::user()->username])
            ->get();

        $totalMessageSent = count($messages);
        return view("message.sent", compact('messages', 'totalMessageSent'));
    }

    public function compose(){
        return view('message.compose');
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
