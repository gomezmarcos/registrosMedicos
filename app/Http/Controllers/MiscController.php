<?php

namespace clinica\Http\Controllers;

use Illuminate\Http\Request;

use clinica\Http\Requests;
use clinica\Misc;
use clinica\DocumentMisc;
use clinica\GalleryConfigurationItem;


use Log;
use Auth;

class MiscController extends Controller
{
	function index(){
        if (!Auth::check()) {
            return redirect('/login');
        }
		$misc = Misc::where('user_id',Auth::user()->id)->get();
		return view('main.misc.index')
			->with('miscs', $misc);
	}

	function store(Request $req){
		$m = new Misc();
		$m->user_id=Auth::user()->id;
		$m->title=$req->title;
		$m->date=$req->date;
		$m->save();

		return redirect()->action('MiscController@index');
	}

	function update($id, Request $req){
		$user=Auth::user();
		$m = Misc::findOrFail($id);
		$m->title = $req->title;
		$m->date = $req->date;

		$m->save();
		return redirect()->action('MiscController@index');
	}

	function destroy($id){
		Misc::destroy($id);
		\File::deleteDirectory(storage_path() . '/images/' . $userId . '/misc/' . $id);

		return redirect()->action('MiscController@index');
	}

    function deleteDocument(Request $req){
		$userId=Auth::user()->id;
        $study = DocumentMisc::findOrFail($req->key);
        if( $study ){
            $filename = storage_path() . '/images/' . $userId . '/misc/' . $study->misc_id . '/' . $study->name;
            \File::delete($filename);
        }
        DocumentMisc::destroy($req->key);
        return '{}';
    }

    function updateDocument(Request $req){
		$user_id=Auth::user()->id;
        $pic = $req->file('miscInputFile')[0];
        $d = DocumentMisc::where('misc_id', $req->docId)->get();


        if ( $d->first() ) {
            return response()->json( 'Varios admite solo un archivo adjunto.', 501 );
        } 

        $d = new DocumentMisc();
        $d->name=$pic->getClientOriginalName();
        $d->path='/images/misc/'.  $d->name ; 
        $d->misc_id=$req->docId;
        $d->save();

        $pic->move( storage_path() . '/images/' . $user_id . '/misc/' . $req->docId . '/' ,  $d->name  );

        return '{}';
    }
    function getMiscImages(Request $req){
        $miscId = $req->miscId;
        $user = Auth::user();

        try{
            $models = DocumentMisc::where([
                ['misc_id', '=', $miscId]
                ])->get();
        } 
        catch(\Exception $e){
            error_log($e);
        }

        $previews = collect([]);
        $configurations = collect([]);
        $initialPath =  '/images/misc/' . $miscId . '/'; 
        foreach ($models as $s) {
            $caption= $s->name; 

            $previews->prepend($initialPath . $caption);

            $m = new GalleryConfigurationItem;
            $m->caption=$caption;
            $m->url='/deleteMiscDocument';
            $m->key=$s->id;
            $m->type= (strtolower($s->extension) == "pdf" ? "pdf" : "image");
            $configurations->prepend($m);
        }
           
        return [$previews, $configurations];
    }
}
