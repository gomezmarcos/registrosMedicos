<?php

namespace clinica\Http\Controllers;

use Illuminate\Http\Request;
use clinica\LaboratoryStudy;
use clinica\RxStudy;
use clinica\OtroStudy;
use clinica\EcoStudy;
use clinica\DocumentStudy;
use clinica\GalleryConfigurationItem;


use clinica\Http\Requests;
use Log;
use Auth;

class ClinicStudyController extends Controller
{
    function index(Request $req){

        if (!Auth::check()) {
            return redirect('/login');
        }

        //buscar
        $studies = LaboratoryStudy::where('user_id', Auth::user()->id)->get();
        $rxStudies = RxStudy::where('user_id', Auth::user()->id)->get();
        $ecoStudies = EcoStudy::where('user_id', Auth::user()->id)->get();
        $otroStudies = OtroStudy::where('user_id', Auth::user()->id)->get();

		$study =  $req->session()->get('study');

	return view('main.clinicStudy.index')
		        ->with('labStudies', $studies)
            	->with('rxStudies', $rxStudies)
            	->with('ecoStudies', $ecoStudies)
            	->with('otroStudies', $otroStudies)
		        ->with('ch', 'ch.value')
		        ->with('study', $study == null ? 'laboratory' : $study);
    }

    //OTRO DATA MANIPULATION :: BEGIN
    function storeOtroStudy(Request $req){
        $m = new OtroStudy();
        $m->user_id=Auth::user()->id;
        $m->title=$req->title;
        $m->date=$req->createOtroDate;
        $m->save();

        return redirect()->action('ClinicStudyController@index')
		        ->with('study', 'other');
    }

    function updateOtroStudy($id, Request $req){
        $m = OtroStudy::findOrFail($id);
        $m->title = $req->title;
        $m->date = $req->editOtroDate;
        $m->save();
        return redirect()->action('ClinicStudyController@index')
		        ->with('study', 'other');
    }

    function destroyOtroStudy($id){
        $study = OtroStudy::findOrFail($id);
        self::destroyStudyDocuments($study, 'otro');
        return redirect()->action('ClinicStudyController@index')
		        ->with('study', 'other');
    }
    //OTRO DATA MANIPULATION :: END

    //RX DATA MANIPULATION :: BEGIN
    function storeRxStudy(Request $req){
        $m = new RxStudy();
        $m->user_id=Auth::user()->id;
        $m->title=$req->title;
        $m->date=$req->createRxDate;
        $m->save();

        return redirect()->action('ClinicStudyController@index')
		        ->with('study', 'rx');
    }

    function updateRxStudy($id, Request $req){
        $m = RxStudy::findOrFail($id);
        $m->title = $req->title;
        $m->date = $req->editRxDate;
        $m->save();
        return redirect()->action('ClinicStudyController@index')
		        ->with('study', 'rx');
    }

    function destroyRxStudy($id){
        $study = RxStudy::findOrFail($id);
        self::destroyStudyDocuments($study, 'rx');
        return redirect()->action('ClinicStudyController@index')
		        ->with('study', 'rx');
    }
    //RX DATA MANIPULATION :: END

    //ECO DATA MANIPULATION :: BEGIN
    function storeEcoStudy(Request $req){
        $m = new EcoStudy();
        $m->user_id=Auth::user()->id;
        $m->title=$req->title;
        $m->date=$req->createEcoDate;
        $m->save();

        return redirect()->action('ClinicStudyController@index')
		        ->with('study', 'eco');
    }

    function updateEcoStudy($id, Request $req){
        $m = EcoStudy::findOrFail($id);
        $m->title = $req->title;
        $m->date = $req->editEcoDate;
        $m->save();
        return redirect()->action('ClinicStudyController@index')
		        ->with('study', 'eco');
    }

    function destroyEcoStudy($id){
        $study = EcoStudy::findOrFail($id);
        self::destroyStudyDocuments($study, 'eco');
        return redirect()->action('ClinicStudyController@index')
		        ->with('study', 'eco');
    }
    //ECO DATA MANIPULATION :: END
    /*
    remueve tanto de la base de datos, como de fichero
    */
    function destroyStudyDocuments($study, $type){
        $userId=Auth::user()->id;
        $filename = storage_path() . '/images/' . $userId . '/study/' . $type . '/' . $study->id . '/';
        \File::deleteDirectory($filename);
        $study->destroy($study->id);

        $type = $type == 'lab' ? 'laboratory' : $type;
        DocumentStudy::where( $type . '_study_id', $study->id )->delete();
    }

    //LABORATORY DATA MANIPULATION :: BEGIN
    function destroyLaboratoryStudy($id){
        $study = LaboratoryStudy::findOrFail($id);
        self::destroyStudyDocuments($study, 'lab');

        return redirect()->action('ClinicStudyController@index')
		        ->with('study', 'laboratory');
    }

    function storeLaboratoryStudy(Request $req){
        $m = new LaboratoryStudy();
        $m->user_id=Auth::user()->id;
        $m->title=$req->title;
        $m->date=$req->createLabDate;
        $m->save();

        return redirect()->action('ClinicStudyController@index')
		        ->with('study', 'laboratory');
    }

    function updateLaboratoryStudy($id, Request $req){
        $m = LaboratoryStudy::findOrFail($id);
        $m->title = $req->title;
        $m->date = $req->editLabDate;
        $m->save();
        return redirect()->action('ClinicStudyController@index')
		        ->with('study', 'laboratory');
    }

    //LABORATORY DATA MANIPULATION :: END

    //GENERAL DOCUMENT MANIPULATION :: BEGIN
    function deleteStudyDocument(Request $req){
        $study = DocumentStudy::findOrFail($req->key);
        if(! is_null($study)){
            $filename = storage_path() . $study->path . $study->name;
            \File::delete($filename);
        }
        DocumentStudy::destroy($req->key);

        return '{}';
    }

    function getStudyImages(Request $req){
        $studyId = $req->docId;
        $user = Auth::user();

        $studyType = '';
        if($req->studyType == 'laboratory'){
            $studyType = 'lab';
            $study_column = 'laboratory_study_id';
        }elseif ($req->studyType == 'rx') {
            $studyType = 'rx';
            $study_column = 'rx_study_id';
        }elseif ($req->studyType == 'eco') {
            $studyType = 'eco';
            $study_column = 'eco_study_id';
        }elseif ($req->studyType == 'otro') {
            $studyType = 'otro';
            $study_column = 'otro_study_id';
        }else{
            Log::error('no se identifico tipo de estudio');
        }

        try{
            $models = DocumentStudy::where([
                [$study_column, '=', $studyId],
                ['study_type', '=', $studyType]
            ])
            ->orderBy('name', 'desc')
            ->get();
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

    //should be create!
    function updateLaboratoryDocStudy(Request $req){
        $d = new DocumentStudy();

        $studyType = '';
        if($req->studyType == 'laboratory'){
            $studyType = 'lab';
            $pic = $req->file('inputFile')[0];
            $d->laboratory_study_id = $req->docId;
        }elseif ($req->studyType == 'rx') {
            $studyType = 'rx';
            $pic = $req->file('rxInputFile')[0];
            $d->rx_study_id = $req->docId;
        }elseif ($req->studyType == 'eco') {
            $studyType = 'eco';
            $pic = $req->file('ecoInputFile')[0];
            $d->eco_study_id = $req->docId;
        }elseif ($req->studyType == 'otro') {
            $studyType = 'otro';
            $pic = $req->file('otroInputFile')[0];
            $d->otro_study_id = $req->docId;
        }else{
            Log::error('no se identifico tipo de estudio');
            return '{}';
        }

        if(is_null($pic)){
            return '{}';
        }

        $d->path='/images/' . Auth::user()->id . '/study/'. $studyType . '/' . $req->docId . '/'; 
        $d->name=$pic->getClientOriginalName();
        $d->extension=$pic->getClientOriginalExtension();
        $d->study_type= $studyType;
        $d->save();

        $pic->move( storage_path() . $d->path . '/', $d->name );

        return '{}';
    }
    //GENERAL DOCUMENT MANIPULATION :: END
}
