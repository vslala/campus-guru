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
        /*
         * Form Input validation
         */
        $this->validate($request, [
            'name' => 'required|max:75',
            'username' => 'required|max:20|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'college' => 'required',
            'branch' => 'required|min:2'
        ]);

        if($request->isMethod("put"))
        {
            $name = $request->get("name");
            $username = $request->get("username");
            $email = $request->get("email");
            $password = $request->get("password");
            $passwordBefore = $password;
            $college = $request->get("college");
            $branch = $request->get("branch");

            $password = Hash::make($password);

            $user = new User();
            $flag = $user->addUser($name, trim($username, ' '), $email,$password,$college,$branch);

            if($flag)
            {
                if(Auth::attempt(["username"=>$username, "password"=>$passwordBefore]))
                {
                    return Redirect::intended('home')->with("flash_message","Welcome ".$name. " to Campus Guru!");
                }
                $message = "You have been successfully registered to Campus Guru!";
                return Redirect::back()->with("flash_message", $message);
            } else {
                $message = "Registration failed! Please Re-Enter your credentials!";
                return Redirect::back()->with("flash_message", $message);
            }
        }
    }

    public function login(Request $request)
    {
        $username = $request->get("username");
        $password = $request->get("password");
        $remember = $request->has("remember") ? true : false ;
        $field = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $auth = Auth::attempt([$field=>$username, "password"=>$password], $remember);

        if($auth){
            return Redirect::intended('home')->with("flash_message", "Welcome ".$username);
        }

        return Redirect::back()->with("flash_message", "Failed Login");

    }

    public function logout()
    {
        Auth::logout();

        return redirect(route("index"));
    }


}
