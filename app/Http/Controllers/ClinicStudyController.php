<?php

namespace clinica\Http\Controllers;

use Illuminate\Http\Request;
use clinica\LaboratoryStudy;
use clinica\RxStudy;
use clinica\EcoStudy;
use clinica\DocumentStudy;
use clinica\GalleryConfigurationItem;


use clinica\Http\Requests;
use Log;
use Auth;

class ClinicStudyController extends Controller
{
    function index(){

        if (!Auth::check()) {
            return redirect('/login');
        }

        //buscar
        $studies = LaboratoryStudy::where('user_id', Auth::user()->id)->get();
        $rxStudies = RxStudy::where('user_id', Auth::user()->id)->get();
        $ecoStudies = EcoStudy::where('user_id', Auth::user()->id)->get();
        //$rxs
        //ecos
        //otros

		return view('main.clinicStudy.index')
			->with('labStudies', $studies)
            ->with('rxStudies', $rxStudies)
            ->with('ecoStudies', $ecoStudies)
			->with('ch', 'ch.value');
    }

    //RX DATA MANIPULATION :: BEGIN
    function storeRxStudy(Request $req){
        $m = new RxStudy();
        $m->user_id=Auth::user()->id;
        $m->title=$req->title;
        $m->date=$req->createRxDate;
        $m->save();

        return redirect()->action('ClinicStudyController@index');
    }

    function updateRxStudy($id, Request $req){
        $m = RxStudy::findOrFail($id);
        $m->title = $req->title;
        $m->date = $req->editRxDate;
        $m->save();
        return redirect()->action('ClinicStudyController@index');
    }

    function destroyRxStudy($id){
        $study = RxStudy::findOrFail($id);
        self::destroyStudyDocuments($study);
        return redirect()->action('ClinicStudyController@index');
    }
    //RX DATA MANIPULATION :: END

    //ECO DATA MANIPULATION :: BEGIN
    function storeEcoStudy(Request $req){
        $m = new EcoStudy();
        $m->user_id=Auth::user()->id;
        $m->title=$req->title;
        $m->date=$req->createEcoDate;
        $m->save();

        return redirect()->action('ClinicStudyController@index');
    }

    function updateEcoStudy($id, Request $req){
        $m = EcoStudy::findOrFail($id);
        $m->title = $req->title;
        $m->date = $req->editRxDate;
        $m->save();
        return redirect()->action('ClinicStudyController@index');
    }

    function destroyEcoStudy($id){
        $study = EcoStudy::findOrFail($id);
        self::destroyStudyDocuments($study);
        return redirect()->action('ClinicStudyController@index');
    }
    //ECO DATA MANIPULATION :: END
    /*
    remueve tanto de la base de datos, como de fichero
    */
    function destroyStudyDocuments($study){
        foreach ($study->documents as $s) {
            $filename = storage_path() . $s->path . $s->name;
            Log::info($filename);
            \File::delete($filename);
            DocumentStudy::destroy($s->id);
        }

        $study->destroy($study->id);
    }

    //LABORATORY DATA MANIPULATION :: BEGIN
    function destroyLaboratoryStudy($id){
        $study = LaboratoryStudy::findOrFail($id);
        self::destroyStudyDocuments($study);
        return redirect()->action('ClinicStudyController@index');
    }

    function storeLaboratoryStudy(Request $req){
        $m = new LaboratoryStudy();
        $m->user_id=Auth::user()->id;
        $m->title=$req->title;
        $m->date=$req->createLabDate;
        $m->save();

        return redirect()->action('ClinicStudyController@index');
    }

    function updateLaboratoryStudy($id, Request $req){
        $m = LaboratoryStudy::findOrFail($id);
        $m->title = $req->title;
        $m->date = $req->editLabDate;
        $m->save();
        return redirect()->action('ClinicStudyController@index');
    }

    //LABORATORY DATA MANIPULATION :: END

    //GENERAL DOCUMENT MANIPULATION :: BEGIN
    function deleteStudyDocument(Request $req){
        $study = DocumentStudy::findOrFail($req->key);
        DocumentStudy::destroy($req->key);
        if(! is_null($study)){
            $filename = storage_path() . $study->path . $study->name;
            Log::info($filename);
            \File::delete($filename);
        }

        return '{}';
    }

    function getStudyImages(Request $req){
        $studyId = $req->docId;
        $user = Auth::user();

        $studyType = '';
        if($req->studyType == 'laboratory'){
            $studyType = 'lab';
        }elseif ($req->studyType == 'rx') {
            $studyType = 'rx';
        }elseif ($req->studyType == 'eco') {
            $studyType = 'eco';
        }else{
            Log::error('no se identifico tipo de estudio');
        }

        try{
            $models = DocumentStudy::where([
                ['laboratory_study_id', '=', $studyId],
                ['study_type', '=', $studyType]
                ])->get();
        } 
        catch(\Exception $e){
            error_log($e);
        }

        $previews = collect([]);
        $configurations = collect([]);
        $initialPath =  '/images/'.$studyType.'/'; 
        foreach ($models as $s) {
            $caption= $s->name; 

            $previews->prepend($initialPath . $studyId . '/' . $caption);

            $m = new GalleryConfigurationItem;
            $m->caption=$caption;
            $m->url='/deleteStudyDocument';
            $m->key=$s->id;
            $m->type= (strtolower($s->extension) == "pdf" ? "pdf" : "image");
            $configurations->prepend($m);
        }
           
        return [$previews, $configurations];
    }

    function updateLaboratoryDocStudy(Request $req){
        $d = new DocumentStudy();

        $studyType = '';
        if($req->studyType == 'laboratory'){
            $studyType = 'lab';
            $pic = $req->file('inputFile')[0];

        }elseif ($req->studyType == 'rx') {
            $studyType = 'rx';
            $pic = $req->file('rxInputFile')[0];
        }elseif ($req->studyType == 'eco') {
            $studyType = 'eco';
            $pic = $req->file('ecoInputFile')[0];
        }else{
            Log::error('no se identifico tipo de estudio');
        }

        $d->path='/images/' . Auth::user()->id . '/study/'. $studyType . '/' . $req->docId . '/'; 
        if(is_null($pic)){
            return '{}';
        }
        $d->laboratory_study_id = $req->docId;
        $d->rx_study_id = $req->docId;
        $d->name=$pic->getClientOriginalName();
        $d->extension=$pic->getClientOriginalExtension();
        $d->study_type= $studyType;
        $d->save();

        $pic->move( storage_path() . $d->path . '/', $d->name );

        return '{}';
    }
    //GENERAL DOCUMENT MANIPULATION :: END
}