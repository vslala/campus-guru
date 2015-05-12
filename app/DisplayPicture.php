<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;

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
            'image_size'=>$imageSize,
            'likeCount'=>0,
            'dislikeCount'=>0
        ]);
        $dp_id = DB::table("display_pictures")->where("username",$username)->get(['id']);

        DB::table("liked_display_pictures")->where(['dp_id'=>$dp_id[0]->id])->delete();

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

    public function updateLikeCount($id)
    {
        $dp = DisplayPicture::find($id);
        $likeCount = $dp->likeCount;
        if($likeCount == null or $likeCount == '')
        {
            $likeCount = 1;
        }else {
            $likeCount++;
        }
        $dp->likeCount = $likeCount;
        $dp->save();

        return $likeCount;
    }

    public function updateDislikeCount($id)
    {
        $dp = DisplayPicture::find($id);
        $dislikeCount = $dp->dislikeCount;
        if($dislikeCount == null or $dislikeCount == '')
        {
            $dislikeCount = 1;
        }else {
            $dislikeCount++;
        }
        $dp->dislikeCount = $dislikeCount;
        $dp->save();

        return $dislikeCount;
    }


}
