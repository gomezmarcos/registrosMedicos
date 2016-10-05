<?php

namespace clinica\Http\Controllers;

use Illuminate\Http\Request;

use clinica\Http\Requests;
use clinica\Test;
use clinica\Document;
use clinica\Http\Requests\TestFormRequest;

class TestController extends Controller
{
	function index(){
		return view('test.index')
			->with('tests', Test::all());
	}

	function create(){
		return view('test.create');
	}

	function store(TestFormRequest $req){
		$t = new Test;
		$t->name=$req->name;
		$t->remember_token=$req->email;
		// $t->test_id=$d->id;
		// $t->documents()->save($d);
		$t->save();

		$d = new Document;
		$d->type='increible';
		$d->path='/images/' . $t->id . '/' . $d->type;
			
		$d->name=$req->file('file')->getClientOriginalName();
		$d->test_id=$t->id;
		$d->save();

		// $req->file('file')->move( base_path() . '/' . $d->path , $d->name );
		// dd($d);
		// dd(base_path());
		$req->file('file')->move( base_path() . '/public' . $d->path . '/', $d->name );
		
		$d = new Document;
		$d->type='awesome';
		$d->path='/store/example/';
		$d->name=$req->file;
		$d->extension='gif';
		$d->test_id=$t->id;
		$d->save();

		return $req->name;
	}

	function show(){
		return 'show page';
	}
	
	function edit($id){
		return view('test.edit')
			->with('test', Test::find($id));
	}
		
	function update(TestFormRequest $req){
		$test = Test::find($req->id);
		$test->name=$req->name;
		$test->remember_token=$req->email;
		$test->save();

		return $this->index();
		// return 'updated';
	}

	function destroy(){
		return 'destroyed';
	}    //
}
