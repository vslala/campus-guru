<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model {

	protected $table = "statuses";

    public function createStatus($username, $status)
    {
        $s = new Status();
        $s->username = $username;
        $s->status = $status;
        $flag = $s->save();

        if($flag)
        {
            return true;
        } else {
            return false;
        }
    }

    public function deleteStatus($id)
    {
        $s = Status::find($id)->first();
        $s->delete();
    }

}
