<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {

	protected $table = "notifications";

    public function addNotification($n_to,$n_by,$n_for,$n_id_of){
        $n = new Notification();
        $n->n_to = $n_to;
        $n->n_by = $n_by;
        $n->n_for = $n_for;
        $n->n_id_of = $n_id_of;
        if($n->save()){
            return true;
        }else{
            return false;
        }
    }

}
