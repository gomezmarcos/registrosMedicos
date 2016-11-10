<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tyc', 
    ['as' => 'tyc', 'uses' => 'TyCController@index']);
Route::post('/tyc/store', 
    ['as' => 'tycStore', 'uses' => 'TyCController@store']);

Route::get('/resume', 
    ['as' => 'resume', 'uses' => 'ProfileController@resume']);

Route::resource('misc', 'MiscController');
Route::get('miscImages',
	['as' => 'miscImages', 'uses' => 'MiscController@getMiscImages']);
Route::post('updateMiscDocument',
	['as' => 'updateMiscDocument', 'uses' => 'MiscController@updateDocument']);
Route::post('deleteMiscDocument',
	['as' => 'deleteMiscDocument', 'uses' => 'MiscController@deleteDocument']);
Route::resource('studies', 'ClinicStudyController');

Route::post('updateLaboratoryDocStudy',
	['as' => 'updateLaboratoryDocStudy', 'uses' => 'ClinicStudyController@updateLaboratoryDocStudy']);
Route::post('deleteStudyDocument',
	['as' => 'deleteStudyDocument', 'uses' => 'ClinicStudyController@deleteStudyDocument']);
Route::get('studyImages',
	['as' => 'studyImages', 'uses' => 'ClinicStudyController@getStudyImages']);

Route::put('storeLaboratoryStudy',
	['as' => 'storeLaboratoryStudy', 'uses' => 'ClinicStudyController@storeLaboratoryStudy']);
Route::put('updateLaboratoryStudy/{id}',
	['as' => 'updateLaboratoryStudy', 'uses' => 'ClinicStudyController@updateLaboratoryStudy']);
Route::delete('destroyLaboratoryStudy/{id}',
	['as' => 'destroyLaboratoryStudy', 'uses' => 'ClinicStudyController@destroyLaboratoryStudy']);

Route::put('storeRxStudy',
	['as' => 'storeRxStudy', 'uses' => 'ClinicStudyController@storeRxStudy']);
Route::put('updateRxStudy/{id}',
	['as' => 'updateRxStudy', 'uses' => 'ClinicStudyController@updateRxStudy']);
Route::delete('destroyRxStudy/{id}',
	['as' => 'destroyRxLaboratoryStudy', 'uses' => 'ClinicStudyController@destroyRxStudy']);

Route::put('storeOtroStudy',
	['as' => 'storeOtroStudy', 'uses' => 'ClinicStudyController@storeOtroStudy']);
Route::put('updateOtroStudy/{id}',
	['as' => 'updateOtroStudy', 'uses' => 'ClinicStudyController@updateOtroStudy']);
Route::delete('destroyOtroStudy/{id}',
	['as' => 'destroyOtroLaboratoryStudy', 'uses' => 'ClinicStudyController@destroyOtroStudy']);

Route::put('storeEcoStudy',
	['as' => 'storeEcoStudy', 'uses' => 'ClinicStudyController@storeEcoStudy']);
Route::put('updateEcoStudy/{id}',
	['as' => 'updateEcoStudy', 'uses' => 'ClinicStudyController@updateEcoStudy']);
Route::delete('destroyEcoStudy/{id}',
	['as' => 'destroyEcoLaboratoryStudy', 'uses' => 'ClinicStudyController@destroyEcoStudy']);

Route::get('profile',
	['as' => 'profile', 'uses' => 'ProfileController@index']);
Route::put('profile/{id}',
	['as' => 'profile.update', 'uses' => 'ProfileController@storeProfile']);
Route::put('profileInfo/{id}',
	['as' => 'profileInfo.update', 'uses' => 'ProfileController@storeProfileInfo']);
Route::put('profileHealthCare/{id}',
	['as' => 'profileHealthCare.update', 'uses' => 'ProfileController@storeProfileHealthCare']);
Route::put('profileContact/{id}',
	['as' => 'profileContact.update', 'uses' => 'ProfileController@storeProfileContact']);
Route::put('profileHeadDoctor/{id}',
	['as' => 'profileHeadDoctor.update', 'uses' => 'ProfileController@storeProfileHeadDoctor']);

Route::get('clinicHistory',
	['as' => 'clinicHistory', 'uses' => 'ClinicHistoryController@index']);
Route::put('clinicHistory/general',
	['as' => 'clinicHistory.general', 'uses' => 'ClinicHistoryController@storeGeneral']);

Route::put('clinicHistory/admittion',
	['as' => 'clinicHistory.admittion', 'uses' => 'ClinicHistoryController@admittion']);
Route::post('clinicHistory/storeAdmittion',
	['as' => 'clinicHistory.admittion.store', 'uses' => 'ClinicHistoryController@storeAdmittion']);
Route::post('clinicHistory/admittion/{admittionId}',
	['as' => 'clinicHistory.admittion.update', 'uses' => 'ClinicHistoryController@updateAdmittion']);
Route::delete('clinicHistory/admittion/{admittionId}',
	['as' => 'clinicHistory.admittion.destroy', 'uses' => 'ClinicHistoryController@destroyAdmittion']);

Route::put('clinicHistory/medication',
	['as' => 'clinicHistory.medication', 'uses' => 'ClinicHistoryController@medication']);
Route::post('clinicHistory/storeMedication',
	['as' => 'clinicHistory.medication.store', 'uses' => 'ClinicHistoryController@storeMedication']);
Route::post('clinicHistory/medication/{medicationId}',
	['as' => 'clinicHistory.medication.update', 'uses' => 'ClinicHistoryController@updateMedication']);
Route::delete('clinicHistory/medication/{medicationId}',
	['as' => 'clinicHistory.medication.destroy', 'uses' => 'ClinicHistoryController@destroyMedication']);

// Retro compatibility routes
Route::get('/old', function () {
    return view('old.datosPersonales');
});
Route::get('/old/datosPersonales', function () {
    return view('old.datosPersonales');
});
Route::get('/old/estudiosClinicos', function () {
    return view('old.estudiosClinicos');
});
Route::get('/old/antecedentesClinicos', function () {
    return view('old.antecedentesClinicos');
});
Route::get('/old/editarPerfil', function () {
    return view('old.editarPerfil');
});
Route::get('/old/varios', function () {
    return view('old.varios');
});

//Image routing

use clinica\DocumentProfile;
use clinica\Profile;
Route::get('/images/profile/', function(){
    $user = Auth::user();
    /*	$profile = Profile::where('user_id', $user->id)->get()->first();
    Log::info($profile);
    */
	$docProfile = DocumentProfile::where('profile_id', $user->id)->first();
	$path = storage_path().'/images/' . $user->id . '/profile/' . $docProfile->name;
    Log::info($path);
	if (file_exists($path)) {
		return Response::download($path);
	}
});

use clinica\Misc;
use clinica\DocumentMisc;
Route::get('/images/misc/{miscId}', function($miscId = null){
    $user = Auth::user();
	$doc = DocumentMisc::where('misc_id', $miscId)->get()->first(); 
	$path = storage_path() . '/images/' . $user->id . '/misc/' . $doc->name;
	if (file_exists($path)) {
        Log::info('existe');
		return Response::download($path);
    }
});

Route::get('/images/{labType}/{labId}/{name}', function($labType=null, $labId=null, $name=null){
    $user = Auth::user();
	$path = storage_path().'/images/' . $user->id . '/study/' . $labType . '/' . $labId . '/' . $name;
	if (file_exists($path)) {
		return Response::download($path);
	}
});

Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/registration', 'RegistrationController@create');
Route::post('/registration/store', 'RegistrationController@store');
