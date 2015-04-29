<?php namespace App\Http\Controllers;

use App\Complain;
use App\Confession;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Suggestion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CCController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }
	public function complain()
    {
        $colleges  = User::distinct()->get(['college']);
        return view('cc.complain', compact('colleges'));
    }
    public function viewAllComplains()
    {
        $data = Complain::all(['complain','college','created_at','id']);
        return view('cc.allComplains', compact('data'));
    }
    public function deleteComplain($id)
    {
        $complain = Complain::find($id);
        $complain->delete();
        return json_encode(['message'=>'The complain has been reported abuse and removed!']);
    }

    public function confession()
    {
        $colleges  = User::distinct()->get(['college']);
        return view('cc.confession', compact('colleges'));
    }
    public function viewAllConfessions()
    {
        $data = Confession::all(['confession', 'college', 'created_at', 'id']);
        return view('cc.allConfessions', compact('data'));
    }

    public function storeComplain(Request $request)
    {
        /*
         * Form Input validation
         */
        $this->validate($request, [
            'complain' => 'required|min:5',
            'college' => 'required',
        ]);
        if($request->isMethod("put"))
        {
            $complain = $request->get("complain");
            $college = $request->get("college");
            $c = new Complain();
            $response = $c->addComplain($college, $complain, Auth::user()->username);

            return Redirect::back();
        }
    }

    public function storeConfession(Request $request)
    {
        /*
         * Form Input validation
         */
        $this->validate($request, [
            'confession' => 'required|min:5',
            'college' => 'required',
        ]);
        if($request->isMethod("put"))
        {
            $confession = $request->get("confession");
            $college = $request->get("college");
            $c = new Confession();
            $response = $c->addConfession($college, $confession, Auth::user()->username);

            return Redirect::back();
        }
    }

    public function deleteConfession($id)
    {
        $confession = Confession::find($id);
        $confession->delete();
        return ['message'=>'The confession has been reported abuse and removed!'];
    }

    /*
     * Add Suggestion by the user
     */
    public function addSuggestion(Request $request){

        /*
         * Form Input validation
         */
        $this->validate($request, [
            'content' => 'required|min:5',
            'username' => 'required',
        ]);
        if($request->ajax()){
            $suggestion = $request->get("content");
            $username = $request->get("username");
            $s = new Suggestion();
            $flag = $s->addSuggestion($username,$suggestion);

            if($flag){
                return "Thank You for your suggestion! I am on it!";
            } else {
                return "I am on it! ";
            }
        } else {
            if($request->isMethod("PUT")){
                $suggestion = $request->get("content");
                $username = $request->get("username");
                $s = new Suggestion();
                $flag = $s->addSuggestion($username,$suggestion);

                if($flag){
                    return Redirect::back()->with("flash_message","Thankyou for your suggestion! I am on it!");
                } else {
                    return Redirect::back()->with("flash_message","I am on it!");
                }
            }

        }


    }
}
