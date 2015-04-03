<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Profile extends Model {

	protected $table = "profiles";

    public function addProfile($username, $aboutMe, $email, $mobile, $dob, $rashi, $state, $city, $website)
    {
        $p = new Profile();
        $p->username = $username;
        $p->about_me = $aboutMe;
        $p->email = $email;
        $p->mobile = $mobile;
        $p->dob = $dob;
        $p->rashi = $rashi;
        $p->state = $state;
        $p->city = $city;
        $p->website = $website;
        $flag = $p->save();
        if($flag)
        {
            return true;
        } else {
            return false;
        }
    }

    public function updateProfile($username, $aboutMe, $email, $mobile, $dob, $rashi, $state, $city, $website)
    {
        try{
            DB::table("profiles")->where(["username"=>$username])->update(
                [
                    "username"=>$username,
                    "email"=>$email,
                    "about_me"=>$aboutMe,
                    "mobile"=>$mobile,
                    "dob"=>$dob,
                    "rashi"=>$rashi,
                    "state"=>$state,
                    "city"=>$city,
                    "website"=>$website,
                    "updated_at"=>new \DateTime()
                ]
            );

            return true;
        }catch(Exception $ex)
        {
            return false;
        }
    }

    public function checkProfile($username, $aboutMe, $email, $mobile, $dob, $rashi, $state, $city, $website)
    {
        $user = new Profile();
        $userProfile = $user->where(["username"=>$username])->get();

        if(count($userProfile) == 1)
        {
            return $this->updateProfile($username, $aboutMe, $email, $mobile, $dob, $rashi, $state, $city, $website);
        }
        else
        {
            return $this->addProfile($username, $aboutMe, $email, $mobile, $dob, $rashi, $state, $city, $website);
        }
    }


}
