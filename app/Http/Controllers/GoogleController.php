<?php

namespace App\Http\Controllers;

use Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class GoogleController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
    	
        
        try{
        $user = Socialite::driver('google')->user();
 		}catch(Exception $e){
 			return redirect('auth/google');
 		}
      
       

        $authUser=$this->findOrCreateUser($user);
      
        Auth::login($authUser,true);
        return redirect('trangchu');

    }
    private function findOrCreateUser($googleUser){

        $authUser=User::where('google_id',$googleUser->id)->first();
        if($authUser){
            return $authUser;
        }else{

        $newUser=new User();
        $newUser->username=$googleUser->name;
        $newUser->google_id=$googleUser->id;
        $newUser->level=3;
        $newUser->master=1;
        $newUser->profile=$googleUser->email;
        $newUser->avatar=$googleUser->avatar_original;
        $newUser->save();
        return $newUser;
        
       }

    }
}