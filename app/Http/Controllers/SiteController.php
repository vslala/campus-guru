<?php namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SiteController extends Controller {

	public function about(){
        return view('site.about');
    }

    public function blog(){
        return view('site.blog');
    }

    public function contact(Request $request){
        if($request->ajax()){
            $name = $request->get('name');
            $email = $request->get('email');
            $mobile = $request->get('mobile');
            $message = $request->get('message');
            $c = new Contact();
            if($c->store($name,$email,$mobile,$message)){
                return "The message has been submitted in style ;)";
            }else{
                return false;
            }
        }
        else{
            $name = $request->get('name');
            $email = $request->get('email');
            $mobile = $request->get('mobile');
            $message = $request->get('message');
            $c = new Contact();
            if($c->store($name,$email,$mobile,$message)){
                return Redirect::back()->with("flash_message", "The message has been sent in style.");
            }else{
                return Redirect::back()->with("flash_message", "Sorry, there was some error send the mail.");
            }
        }
    }



}
