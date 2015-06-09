<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\QuestionTag;
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

    public function _search($searchTerm, $table){
        // table and searchTerm will be passed from the view
        if($table == "questions"){
//            $result = QuestionTag::where("tag", "LIKE", $searchTerm.'%')->get()->toJSON();
            $result = DB::table("question_tags")
                ->where("question_tags.tag", "LIKE", '%'.$searchTerm.'%')
                ->leftJoin("questions", "question_tags.q_id", "=", "questions.id")
                ->leftJoin("display_pictures", "display_pictures.username", "=", "questions.username")
                ->select("questions.id", "questions.username", "questions.title", "questions.category", "questions.created_at",
                    "question_tags.tag", "display_pictures.image_url", "display_pictures.image_name"
                    )
                ->get();
            $result = json_encode($result);
        return $result;
        }

        if($table == "discussions"){
            $result = DB::table("discussion_tags")
                ->where("discussion_tags.tag", "LIKE", '%'.$searchTerm.'%')
                ->leftJoin("discussions", "discussion_tags.d_id", "=", "discussions.id")
                ->leftJoin("display_pictures", "display_pictures.username", "=", "discussions.username")
                ->select("discussions.id", "discussions.username", "discussions.title", "discussions.category", "discussions.created_at",
                    "discussion_tags.tag", "display_pictures.image_url", "display_pictures.image_name"
                )
                ->get();
            $result = json_encode($result);
            return $result;
        }
    }

}
