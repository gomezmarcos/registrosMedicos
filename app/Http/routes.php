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
Route::resource('misc', 'MiscController');
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
Route::get('/images/{user_id}/increible/{image}', function($user_id=null,$image = null){
	$path = storage_path().'/test-img/test.jpg';
	if (file_exists($path)) {
		return Response::download($path);
	}
});
Route::get('/images/misc/{user_id}/{misc_id}', function($user_id=null,$misc_id = null){
	$path = storage_path().'/images/misc/' . $user_id . '/' . $misc_id . '.jpg';
	if (file_exists($path)) {
		return Response::download($path);
	}
});

Route::get('/images/profile/{user_id}', function($user_id=null){
	$path = storage_path().'/images/profile/' . $user_id . '/' . $user_id . '.jpg';
	if (file_exists($path)) {
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
