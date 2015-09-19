<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model {

	protected $table = "complains";

    public function addComplain($college, $complain, $username)
    {
        $c = new Complain();
        $c->complain = $complain;
        $c->college = $college;
        $c->username = $username;
        $c->save();

        $response = ["complain"=>$complain, "college"=>$college];
        return $response;
    }

}
