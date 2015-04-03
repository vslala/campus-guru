<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}

    public function register(Request $request)
    {
        if($request->isMethod("put"))
        {
            $name = $request->get("name");
            $username = $request->get("username");
            $email = $request->get("email");
            $password = $request->get("password");
            $college = $request->get("college");
            $branch = $request->get("branch");

            $password = Hash::make($password);

            $user = new User();
            $flag = $user->addUser($name, $username, $email,$password,$college,$branch);

            if($flag)
            {
                $message = "You have been successfully registered to Campus Guru!";
                return redirect(route("index"));
            } else {

            }
        }
    }

    public function login(Request $request)
    {
        $username = $request->get("username");
        $password = $request->get("password");
        if(Auth::attempt(["username"=>$username, "password"=>$password]))
        {
            return Redirect::intended('home');
        }

        return Redirect::back()->with("flash_message", "Faild Login");

    }

    public function logout()
    {
        Auth::logout();

        return redirect(route("index"));
    }


}
