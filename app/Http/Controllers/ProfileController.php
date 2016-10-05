<?php

namespace clinica\Http\Controllers;

use Illuminate\Http\Request;

use clinica\Http\Requests;
use clinica\User;
use clinica\Profile;
use clinica\ProfileInfo;
use clinica\ProfileHealthCare;
use clinica\ProfileHeadDoctor;
use clinica\ProfileContact;
use clinica\DocumentProfile;

use Log;


class ProfileController extends Controller
{
    function index(){
		$user = User::findOrFail(3);

		$profile = Profile::where('user_id', $user->id)->first();
		$profileInfo = ProfileInfo::where('user_id', $user->id)->first();
		$profileInfo = $profileInfo == null ? new ProfileInfo : $profileInfo;
		// dd($profileInfo);
		$profileHealthCare = ProfileHealthCare::where('user_id', $user->id)->first();
		$profileHealthCare = $profileHealthCare == null ? new ProfileHealthCare : $profileHealthCare;

		$profileContact = ProfileContact::where('user_id', $user->id)->first();
		$profileContact = $profileContact == null ? new ProfileContact : $profileContact;

		$profileHeadDoctor = ProfileHeadDoctor::where('user_id', $user->id)->first();
		$profileHeadDoctor = $profileHeadDoctor == null ? new profileHeadDoctor : $profileHeadDoctor;

        $defaultProfilePicture = 'https://addons.cdn.mozilla.net/static/img/zamboni/anon_user.png';
		$profilePicture = DocumentProfile::where('profile_id', $user->id)->first();
		$profilePicture = $profilePicture == null ? $defaultProfilePicture : 'images/profile/'.$user->id;

		$listDniTypes = array('DNI'=>'DNI', 'LC'=>'LC', 'LE'=>'LE', 'Cedula'=>'Cedula');
		$listBloodTypes = array('A rH+'=>'A rh+', 'AB rH+'=>'AB rH+', 'B rH+'=>'B rH+', '0 rH+'=>'0 rH+', 'A rH-'=>'A rh-', 'AB rH-'=>'AB rH-', 'B rH-'=>'B rH-', '0 rH-'=>'0 rH-');

		return view('main.profile.index')
			->with('p', $profile)
			->with('pi', $profileInfo)
			->with('pc', $profileContact)
			->with('phc', $profileHealthCare)
			->with('phd', $profileHeadDoctor)
			->with('listBloodTypes', $listBloodTypes)
			->with('listDniTypes', $listDniTypes)
			->with('profilePicture', $profilePicture);
	}
		//Log::info("been here"); log into logs
		// error_log('Some message here.'); log into console


	function storeProfile(Request $req){
		Log::info($req);// log into logs
		$profile = Profile::where('user_id', 3)->first();
		if(null == $profile) {
			$profile = new Profile;
			$profile->user_id=3;
		}

		$profile->names=$req->names;
		$profile->lastNames=$req->lastNames;
		$profile->dni=$req->dni;
		$profile->dniType=$req->dniType;
		$profile->address=$req->address;
		$profile->city=$req->city;
		$profile->state=$req->state;
		$profile->country="Argentina";
		$profile->email1=$req->email1;
		$profile->email2=$req->email2;
		$profile->cellPhone1=$req->cellPhone1;
		$profile->cellPhone2=$req->cellPhone2;
		$profile->phone1=$req->phone1;
		$profile->phone2=$req->phone2;
		$profile->save();

		//sin cambios -> null
		//borrado -> ""
		//con imagen -> imagen

		$whatToDo = $this->evaluateFile($req->profilePicture);
		switch ($whatToDo) {
			case 'DELETE_IMAGE':
				if(! is_null($profile->documentProfile)){
					$filename = storage_path() . '/images/profile/3/3' . '.jpg';
					\File::delete($filename);
					DocumentProfile::destroy($profile->documentProfile->id);
				}
				//else : do nothing
				break;
			case 'SAVE_IMAGE':
				$d = DocumentProfile::where('profile_id', $profile->id)->first();
				if(null == $d) {
					$d = new DocumentProfile();
				}
				$d->path='/images/profile/' . 3;//2 is user_id 
				$d->name=3;
				$d->extension=$req->file('profilePicture')->getClientOriginalExtension();
				$d->profile_id=$profile->id;
				$d->save();

				$req->file('profilePicture')->move( storage_path() . $d->path . '/', $d->name . '.' . $d->extension );
				break;
			case 'DO_NOTHING':
				break;
		}

		return redirect()->action('ProfileController@index');
	}

	function storeProfileInfo(Request $req){
		$profileInfo = null;
		if( !ProfileInfo::where('user_id', 3)->count() ) {
			$profileInfo = new ProfileInfo;
			$profileInfo->user_id=3;
		} else {
			$profileInfo = ProfileInfo::where('user_id', 3)->first();
		}

		$profileInfo->bloodType=$req->bloodType;
		$profileInfo->allergies=$req->allergies;
		$profileInfo->implants=$req->implants;
		$profileInfo->vaccines=$req->vaccines;
		$profileInfo->save();

		return redirect()->action('ProfileController@index');
	}
	
	function storeProfileHealthCare(Request $req){
		$profileHealthCare = null;
		if( !profileHealthCare::where('user_id', 3)->count() ) {
			$profileHealthCare = new profileHealthCare;
			$profileHealthCare->user_id=3;
		} else {
			$profileHealthCare = profileHealthCare::where('user_id', 3)->first();
		}

		$profileHealthCare->name=$req->name;
		$profileHealthCare->plan=$req->plan;
		$profileHealthCare->healthCareId=$req->healthCareId;
		$profileHealthCare->phone=$req->phone;
		$profileHealthCare->web=$req->web;
		$profileHealthCare->contact=$req->contact;
		// dd($profileHealthCare);
		$profileHealthCare->save();

		return redirect()->action('ProfileController@index');
	}

	function storeProfileContact(Request $req){
		$profileContact = null;
		if( !profileContact::where('user_id', 3)->count() ) {
			$profileContact = new profileContact;
			$profileContact->user_id=3;
		} else {
			$profileContact = profileContact::where('user_id', 3)->first();
		}

		$profileContact->name1=$req->name1;
		$profileContact->name2=$req->name2;
		$profileContact->name3=$req->name3;
		$profileContact->link1=$req->link1;
		$profileContact->link2=$req->link2;
		$profileContact->link3=$req->link3;
		$profileContact->contact1=$req->contact1;
		$profileContact->contact2=$req->contact2;
		$profileContact->contact3=$req->contact3;
		// dd($profileHealthCare);
		$profileContact->save();

		return redirect()->action('ProfileController@index');
	}

	function storeProfileHeadDoctor(Request $req){
		$profileHeadDoctor = null;
		if( !profileHeadDoctor::where('user_id', 3)->count() ) {
			$profileHeadDoctor = new profileHeadDoctor;
			$profileHeadDoctor->user_id=3;
		} else {
			$profileHeadDoctor = ProfileHeadDoctor::where('user_id', 3)->first();
		}

		$profileHeadDoctor->name1=$req->name1;
		$profileHeadDoctor->name2=$req->name2;
		$profileHeadDoctor->note1=$req->note1;
		$profileHeadDoctor->note2=$req->note2;
		$profileHeadDoctor->contact1=$req->contact1;
		$profileHeadDoctor->contact2=$req->contact2;
		// dd($profileHealthCare);
		$profileHeadDoctor->save();

		return redirect()->action('ProfileController@index');
	}
	private function evaluateFile($file){

		if(! is_null($file) && trim($file)===''){// $file==""
			return "DELETE_IMAGE";
		}
		if( is_null($file) ){// $file == null
			return "DO_NOTHING";
		}
		if(! is_null($file) && trim($file)!==''){ // $file== uploaded file
			return "SAVE_IMAGE";
		}
	}
}
