<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }


        public function handleProviderCallback()
    {
        $userFacebook = Socialite::driver('facebook')->user();

        $findUser = User::where('email', $userFacebook->email)->first();

        if($findUser){
            $user = $findUser;
        }else{
            $user = new User;
            $user->name = $userFacebook->getName();
            $user->email = $userFacebook->getEmail();
            $user->password = bcrypt(123456);
            $user->save();
        }

        Auth::login($user);

        return redirect($this->redirectTo);
    }


    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


        public function handleProviderCallbackGoogle()
    {
        $userGoogle = Socialite::driver('google')->user();

        $findUserG = User::where('email', $userGoogle->email)->first();

        if($findUserG){
            $user = $findUserG;
        }else{
            $user = new User;
            $user->name = $userGoogle->getName();
            $user->email = $userGoogle->getEmail();
            $user->password = bcrypt(123456);
            $user->save();
        }

        Auth::login($user);

        return redirect($this->redirectTo);
    }
}
