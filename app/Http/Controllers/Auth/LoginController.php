<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Exception;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	public function redirectToGoogle()
	{
		return Socialite::driver('google')->redirect();
	}

	public function handleGoogleCallback()
	{
		try {

			$user = Socialite::driver('google')->user();

			$finduser = User::where('google_id', $user->id)->first();

			if($finduser){

				Auth::login($finduser);
				$to_name = $user->name;
				$to_email = $user->email ;
				$data = array('name'=>$user->name, 'body' =>'You have login to Woobly by this Google account');
				\Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
					$message->to($to_email, $to_name)
						->subject('Login to Woobly');
					$message->from('projectphpsellinggame@gmail.com','Woobly .inc');
				});
				return redirect('/');

            }else{
				$newUser = User::create([
					'name' => $user->name,
					'email' => $user->email,
					'google_id'=> $user->id
				]);

				Auth::login($newUser);
				$to_name = $user->name;
				$to_email = $user->email ;
				$data = array('name'=>$user->name, 'body' =>'Welcome to Woobly, 
					now you can login to us by this google account');
				\Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
					$message->to($to_email, $to_name)
						->subject('Welcome to Woobly');
					$message->from('projectphpsellinggame@gmail.com','Woobly .inc');
				});
				return redirect('/');
				//return redirect()->back();
			}

		} catch (Exception $e) {
			return redirect('auth/google');
		}
	}
}
