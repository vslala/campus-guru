<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class DisplayPicture extends Model {

	protected $table = "display_pictures";

    private function addImage($username, $imageName, $imageType, $imageUrl, $imageSize)
    {
        $image = new DisplayPicture();
        $image->username = $username;
        $image->image_name = $imageName;
        $image->image_type = $imageType;
        $image->image_url = $imageUrl;
        $image->image_size = $imageSize;
        $flag = $image->save();

        if($flag)
            return true;
        else
            return false;
    }

    private function updateImage($username, $imageName, $imageType, $imageUrl, $imageSize)
    {
        DB::table("display_pictures")->where("username",$username)->update([
            'image_name'=>$imageName,
            'image_type'=>$imageType,
            'image_url'=>$imageUrl,
            'image_size'=>$imageSize
        ]);

        return true;
    }


    public function check($username, $imageName, $imageType, $imageUrl, $imageSize)
    {
        $image = new DisplayPicture();
        $userImage = $image->where(["username"=>$username])->get();

        if(count($userImage) == 1)
        {
            return $this->updateImage($username, $imageName, $imageType, $imageUrl, $imageSize);
        }
        else
        {
            return $this->addImage($username, $imageName, $imageType, $imageUrl, $imageSize);
        }
    }

}
