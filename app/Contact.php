<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

    protected $table = "contacts";

    public function store($name, $email, $mobile, $message){
        $contact = new Contact();
        $contact->name = $name;
        $contact->email = $email;
        $contact->mobile = $mobile;
        $contact->message = $message;
        return $contact->save();
    }


}
