<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\User;

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

    public function __construct()
    {

        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

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

        if($user=Socialite::with('facebook')->user()){

            if ($the_user = User::select()->where('email', '=', $user->email)->first())
            {
                Auth::login($the_user);

            }
            else{
                $new_user=User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => null,
                    'score' => 0.0,
                    'level'=> 1,
                    'win_matches' => 0,
                    'lost_matches' => 0,
                    'image'=> $user->avatar
                ]);
                Auth::login($new_user);

            }
            return redirect('/');
        }
        else{
            return "falloo!!";
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

}
