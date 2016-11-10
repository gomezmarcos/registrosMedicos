<?php

namespace clinica\Http\Controllers;

use Illuminate\Http\Request;

use clinica\Http\Requests;
use clinica\User;
use clinica\Profile;
use Auth;

class TyCController extends Controller
{
    function index(){
        if (!Auth::check()) {
            return redirect('/login');
        }
		return view('main.tyc.index');
    }

	function store(){
        if (!Auth::check()) {
            return redirect('/login');
        }
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        $profile->tyc='ok';
        $profile->save();

		return redirect()->action('ProfileController@index');
	}
}
