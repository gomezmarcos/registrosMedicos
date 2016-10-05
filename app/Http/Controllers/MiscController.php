<?php

namespace clinica\Http\Controllers;

use Illuminate\Http\Request;

use clinica\Http\Requests;
use clinica\Misc;
use clinica\DocumentMisc;

class MiscController extends Controller
{
	function index(){
		$misc = Misc::all();
		return view('main.misc.index')
			->with('miscs', $misc);
	}

	function store(Request $req){
		$m = new Misc();
		$m->user_id=2;
		$m->title=$req->title;
		$m->date=$req->date;
		$m->save();
		//falta crear la columna de fecha

		if(! is_null($req->file)){
			$d = new DocumentMisc();
			$d->path='/images/misc/' . $m->user_id; 
			$d->extension=$req->file('file')->getClientOriginalExtension();
			$d->name=$m->id . '.' . $d->extension;
			$d->misc_id=$m->id;
			$d->save();

			$req->file('file')->move( storage_path() . $d->path . '/', $d->name . '.' . $d->extension );
		}

		return redirect()->action('MiscController@index');
	}

	function destroy($id){
		$misc = Misc::findOrFail($id);
		$doc = $misc->documentMisc;
		Misc::destroy($id);
		if(! is_null($doc)){
			$filename = storage_path() . $doc->path . '/' . $id . '.jpg';
			\File::delete($filename);
		}

		return redirect()->action('MiscController@index');
	}

	function update($id, Request $req){
		$m = Misc::findOrFail($id);
		$m->title = $req->title;
		$m->date = $req->date;

		$isImageToUpdate = !is_null($req->filee);
		$isImageWithContent = $req->filee != '';

		if($isImageToUpdate){
			//delete previous image
			$doc = $m->documentMisc;
			if(!is_null($doc)){
				$filename = storage_path() . $doc->path . '/' . $id . '.jpg';
				\File::delete($filename);
				DocumentMisc::destroy($doc->id);
			}

			if($isImageWithContent){
				//create new image
				$d = new DocumentMisc();
				$d->path='/images/misc/' . $m->user_id; 
				$d->name=$m->id;
				$d->extension=$req->file('filee')->getClientOriginalExtension();
				$d->misc_id=$m->id;
				$d->save();
				$req->file('filee')->move( storage_path() . $d->path . '/', $d->name . '.' . $d->extension );
			}

		}
		$m->save();
		return redirect()->action('MiscController@index');
	}
}
