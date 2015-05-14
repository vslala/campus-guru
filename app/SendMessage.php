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
        $message_id =  $m->id;
        if($flag){
            $n = new Notification();
            $n->n_to = $reciever;
            $n->n_by = $sender;
            $n->n_for = 3;
            $n->n_id_of = $message_id;
            $n->save();
            return true;
        }else{
            return false;
        }
    }

}
