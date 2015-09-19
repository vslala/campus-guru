<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DislikedStatus extends Model {

    protected $table = "disliked_statuses";

    public function likeIncrement($username, $status_id)
    {
        $ds = new DislikedStatus();
        $check = $ds->where(["username"=>$username, "status_id"=>$status_id])->get();
        if(! isset($check))
        {
            $ds->username = $username;
            $ds->status_id = $status_id;
            $flag = $ds->save();

            if($flag)
            {
                $check = $ds->where(["username"=>$username, "status_id"=>$status_id])->get();
                return count($check);
            }else{
                $check = $ds->where(["username"=>$username, "status_id"=>$status_id])->get();
                return count($check);
            }
        }
    }

}
