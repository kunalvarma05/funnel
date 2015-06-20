<?php

namespace Funnel\Http\Controllers\Auth;

use \Auth;
use Funnel\User;
use Validator;
use Funnel\Http\Controllers\Controller;
use \Socialite;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->scopes(['public_profile','email'])->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $fbUser = Socialite::driver('facebook')->user();

        $user = User::where('email', $fbUser->getEmail())->first();

        //User not found
        if(!$user){
            $user = User::create([
                'name' => $fbUser->getName(),
                'email' => $fbUser->getEmail(),
                'picture' => $fbUser->getAvatar()
                ]);
        }

        //If the user was created
        if($user){
            //Log in the user
            if(Auth::loginUsingId($user->id)){
                return redirect()->intended('backend');
            }
        }
    }
}
