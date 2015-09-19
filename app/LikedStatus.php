<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LikedStatus extends Model {

	protected $table = "liked_statuses";

    public function likeIncrement($username, $status_id)
    {
        $ls = new LikedStatus();
        $check = $ls->where(["username"=>$username, "status_id"=>$status_id])->get();
        if(! isset($check))
        {
            $ls->username = $username;
            $ls->status_id = $status_id;
            $flag = $ls->save();

            if($flag)
            {
                $check = $ls->where(["username"=>$username, "status_id"=>$status_id])->get();
                return count($check);
            }else{
                $check = $ls->where(["username"=>$username, "status_id"=>$status_id])->get();
                return count($check);
            }
        }
    }

}
