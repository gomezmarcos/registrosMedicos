<?php

namespace clinica\Http\Controllers;

use Illuminate\Http\Request;

use clinica\Http\Requests;
use clinica\User;
use clinica\Profile;
use Log;
use Auth;
use Validator;

class RegistrationController extends Controller
{
    function create(){
        if (!Auth::check() 
            || Auth::user()->id !== 4
            || Auth::user()->id !== 32
            || Auth::user()->id !== 31
        )
            return redirect('/resume');
        return view('main.admin.registration');
    }

    function store(Request $r){
        $v = $this->validator($r->toArray());
        if ($v->fails()){
            return redirect()->back()->withErrors($v);
        }
        $user = new User;
        $user->name=$r->names;
        $user->dni=$r->dni;
        $user->password = bcrypt($r->password);
        $user->save();

        $profile = new Profile;
        $profile->user_id=$user->id;
        $profile->id=$user->id;
        $profile->names=$r->names;
        $profile->lastNames=$r->lastNames;
        $profile->dni=$r->dni;
        $profile->email1=$r->email;
        $profile->phone1=$r->phone;
        $profile->save();

        return redirect('/registration');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $r
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $r)
    {
        $v =  Validator::make($r, [
            'names' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'lastNames' => 'required|max:255',
            'dni' => 'required|max:9|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);
        return $v;
    }
}
