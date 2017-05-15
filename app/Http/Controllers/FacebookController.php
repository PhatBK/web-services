<?php

namespace App\Http\Controllers;

use Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class FacebookController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        
        try{
        $user = Socialite::driver('facebook')->user();
        }catch(Exception $e){
            return redirect('auth/facebook');
        }
        
       

        $authUser=$this->findOrCreateUser($user);
      
        Auth::login($authUser,true);
        return redirect('trangchu');

    }
    private function findOrCreateUser($facebookUser){
        $authUser=User::where('facebook_id',$facebookUser->id)->first();
        if($authUser){
            return $authUser;
        }else{
        $newUser=new User();
        $newUser->username=$facebookUser->name;
        $newUser->email="$facebookUser->name"."$facebookUser->id"."@gmail.com";
        $newUser->facebook_id=$facebookUser->id;
        $newUser->level=3;
        $newUser->master=1;
        $newUser->profile=$facebookUser->profileUrl;
        $newUser->avatar=$facebookUser->avatar_original;
        $newUser->save();
        return $newUser;
       }

    }
}