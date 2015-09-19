<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller {

	public function _searchUsername(Request $request)
    {
        $searchTerm = $request->get("searchTerm");

        $result = User::where("username", "LIKE", $searchTerm."%")->get()->toJSON();

        return $result;
    }

}
