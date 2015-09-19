<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Confession extends Model {

	protected $table = "confessions";

    public function addConfession($college, $confession, $username)
    {
        $c = new Confession();
        $c->confession = $confession;
        $c->college = $college;
        $c->username = $username;
        $c->save();

        $response = ["complain"=>$confession, "college"=>$college];
        return $response;
    }

}
