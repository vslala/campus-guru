<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model {

    protected $table = "attachments";
	public function addFile($qId,$imageName, $imageSize, $imageType, $imageUrl)
    {
        $file = new Attachment();
        $file->q_id = $qId;
        $file->image_name = $imageName;
        $file->image_size = $imageSize;
        $file->image_type = $imageType;
        $file->image_url = $imageUrl;
        $flag = $file->save();

        if($flag)
            return true;
        else
            return false;
    }

}
