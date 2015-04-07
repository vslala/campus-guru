<?php namespace App\Http\Controllers;

use App\Complain;
use App\Confession;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CCController extends Controller {

	public function complain()
    {
        $colleges  = User::all(['college']);
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
        $colleges  = User::all(['college']);
        return view('cc.confession', compact('colleges'));
    }
    public function viewAllConfessions()
    {
        $data = Confession::all(['confession', 'college', 'created_at', 'id']);
        return view('cc.allConfessions', compact('data'));
    }

    public function storeComplain(Request $request)
    {
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
}
