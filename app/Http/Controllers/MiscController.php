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

        /*
		if(! is_null($req->file)){
			$d = new DocumentMisc();
			$d->path='/images/misc/'; 
			$d->extension=$req->file('file')->getClientOriginalExtension();
			$d->misc_id=$m->id;
			$d->name=$m->id;
			$d->save();

            \File::delete(storage_path() .'/images/' . $m->user_id . '/misc/' . $m->user_id . '.' . $d->extension);

			$req->file('file')->move( storage_path() . '/images/' . $m->user_id . '/misc/'. $m->id . '.' . $d->extension  );
		}
        */

		return redirect()->action('MiscController@index');
	}

    function deleteDocument(Request $req){
		$user_id=Auth::user()->id;
        $study = DocumentMisc::findOrFail($req->key)->get();
        if( $study->first() ){
            $study=$study->first();
            $filename = storage_path() . '/images/' . $user_id . '/misc/' . $study->misc_id . '/' . $study->name;
            \File::delete($filename);
        }
        if(! is_null($study)){
            $filename = storage_path() . '/images/' . $user_id . '/misc/' . $req->key . '/' . $study->name;
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
        $d->path='/images/misc/'.  $req->docId ; 
        $d->misc_id=$req->docId;
        $d->name=$pic->getClientOriginalName();
        $d->save();

        $pic->move( storage_path() . '/images/' . $user_id . '/misc/' . $req->docId . '/' ,  $d->name  );

        return '{}';
    }

	function destroy($id){
		$misc = Misc::findOrFail($id);
		$doc = $misc->documentMisc;
		Misc::destroy($id);
		if(! is_null($doc)){
			$filename = storage_path() . '/images/' . $misc->user_id . '/misc/' . $doc->misc_id . '/' . $doc->name  ;
			\File::delete($filename);
		}

		return redirect()->action('MiscController@index');
	}

	function update($id, Request $req){
		$user=Auth::user();
		$m = Misc::findOrFail($id);
		$m->title = $req->title;
		$m->date = $req->date;

        /*
		$isImageToUpdate = !is_null($req->filee);
		$isImageWithContent = $req->filee != '';

		if($isImageToUpdate){
			//delete previous image
			$doc = $m->documentMisc;
			if(!is_null($doc)){
				$filename = storage_path() . '/images/' . $user->id . '/misc/' . $id . '.' . $doc->extension;
				\File::delete($filename);
				DocumentMisc::destroy($doc->id);
			}

			if($isImageWithContent){
				//create new image
				$d = new DocumentMisc();
				$d->path='/images/misc/'; 
				$d->name=$m->id;
				$d->extension=$req->file('filee')->getClientOriginalExtension();
				$d->misc_id=$m->id;
				$d->save();
				$req->file('filee')->move( storage_path() . $d->path . $d->name . '.' . $d->extension );
			}

		}
         */
		$m->save();
		return redirect()->action('MiscController@index');
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

            #$previews->prepend($initialPath . $s->name );
            $previews->prepend($initialPath );

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
