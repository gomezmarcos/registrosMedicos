<?php

namespace clinica\Http\Controllers\Auth;

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

    public function loginUsername()
    {
        return property_exists($this, 'username') ? $this->username : 'dni';//TODO TAG super fix que no permitia logueo
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
