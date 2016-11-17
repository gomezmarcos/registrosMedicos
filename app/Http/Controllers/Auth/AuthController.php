<?php

namespace clinica\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

use clinica\User;
use clinica\Profile;
use Validator;
use clinica\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Log;

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

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/resume';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'names' => 'required|max:255',
            'email' => 'required|max:255',
            'dni' => 'required|max:9|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    
    /*
     * TAG trait
     */
    public function loginUsername()
    {
        return property_exists($this, 'username') ? $this->username : 'dni';//TODO TAG super fix que no permitia logueo
    }

    /**
     * TAG trait
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $throttles
     * @return \Illuminate\Http\Response
     */
    public function handleUserWasAuthenticated(Request $request, $throttles)
    {
        if ($throttles) {
            $this->clearLoginAttempts($request);
        }

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::guard($this->getGuard())->user());
        }

        return redirect()->intended($this->redirectPath());
    }

    /*
     * TAG trait
     */
    public function authenticated(Request $request, User $user ) {
        $tyc = Profile::where('user_id', $user->id)->first()->tyc;

        if ($tyc=='ok') {
            return redirect()->intended( $this->redirectPath() );
        } else {
            return redirect()->route('tyc');
        }
        


        //return redirect()->intended( $this->redirectPath() );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $user = new User;
		$user->name=$data['names'];
		$user->dni=$data['dni'];
        $user->password = bcrypt($data['password']);
        $user->save();
		
        $profile = new Profile;
		$profile->names=$data['names'];
		$profile->dni=$data['dni'];
		$profile->email1=$data['email'];
		$profile->user_id=$user->id;
		$profile->save();

        return $user;
    }
}
