<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SendMessage extends Model {

	protected $table = "send_messages";

    public function sendMessage($sender,$reciever,$subject,$message = '',$fileName = '',$fileUrl=''){
        $m = new SendMessage();
        $m->sender_username = $sender;
        $m->reciever_username = $reciever;
        $m->subject = $subject;
        $m->message = $message;
        $m->file_name = $fileName;
        $m->file_url = $fileUrl;
        $flag = $m->save();
        if($flag){
            return true;
        }else{
            return false;
        }
    }

}
