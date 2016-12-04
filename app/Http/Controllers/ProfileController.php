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
use clinica\ClinicHistory;

use Log;
use Auth;

class ProfileController extends Controller
{
    function index(){
        if (!Auth::check()) {
            return redirect('/login');
        }
        $user=Auth::user();

	$profile = Profile::where('user_id', $user->id)->first();
        $profile = $profile == null ? new Profile : $profile;

        $defaultProfilePicture = env('APP_STATIC_PATH') . '/images/admin/no_user.png';
		$profilePicture = DocumentProfile::where('profile_id', $user->id)->first();
		$profilePicture = $profilePicture == null ? $defaultProfilePicture : $profilePicture->path;

		$clinicHistory = ClinicHistory::where('user_id', $user->id)->first();
		$clinicHistory = $clinicHistory == null ? new ClinicHistory : $clinicHistory;

		$profileHealthCare = ProfileHealthCare::where('user_id', $user->id)->first();
		$profileHealthCare = $profileHealthCare == null ? new ProfileHealthCare : $profileHealthCare;

		$profileContact = ProfileContact::where('user_id', $user->id)->first();
		$profileContact = $profileContact == null ? new ProfileContact : $profileContact;

		$profileHeadDoctor = ProfileHeadDoctor::where('user_id', $user->id)->first();
		$profileHeadDoctor = $profileHeadDoctor == null ? new profileHeadDoctor : $profileHeadDoctor;

		$listDniTypes = array('DNI'=>'DNI', 'LC'=>'LC', 'LE'=>'LE', 'Cedula'=>'Cedula');
		$listBloodTypes = array('A rH+'=>'A rh+', 'AB rH+'=>'AB rH+', 'B rH+'=>'B rH+', '0 rH+'=>'0 rH+', 'A rH-'=>'A rh-', 'AB rH-'=>'AB rH-', 'B rH-'=>'B rH-', '0 rH-'=>'0 rH-');

		return view('main.profile.index')
			->with('p', $profile)
			->with('pi', $clinicHistory)
			->with('pc', $profileContact)
			->with('phc', $profileHealthCare)
			->with('phd', $profileHeadDoctor)
			->with('listBloodTypes', $listBloodTypes)
			->with('listDniTypes', $listDniTypes)
			->with('profilePicture', $profilePicture);
	}

	function storeProfile(Request $req){
        $user=Auth::user();
	$profile = Profile::where('user_id', $user->id)->first();
        if(null == $profile) {
          $profile = new Profile;
          $profile->user_id=$user->id;
        }
        $profile->id=$user->id;//es necesario para que no haya errores en la app //FIX!! Siempre me olvido que esto tiene que estar

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
        $profile->birthdate=$req->birthdate;
        $profile->save();

        $user->email=$req->email1;
        $user->name=$req->names;
        $user->save();

        //sin cambios -> null
        //borrado -> ""
        //con imagen -> imagen

        $whatToDo = $this->evaluateFile($req);
        switch ($whatToDo) {
        case 'DELETE_IMAGE':
          if(! is_null($profile->documentProfile)){
            $doc = DocumentProfile::where('profile_id', $profile->id)->first();
            $fileSystemPath='/images/' . $user->id . '/profile/';
            $filename = storage_path() . $fileSystemPath . $doc->name;
            DocumentProfile::destroy($profile->documentProfile->id);
            \File::delete($filename);
          }
          //else : do nothing
          break;
        case 'SAVE_IMAGE':
          $d = DocumentProfile::where('profile_id', $profile->id)->first();
          if(null == $d) {
            $d = new DocumentProfile();
          } else {
            $fileSystemPath='/images/' . $user->id . '/profile/';
            \File::delete(storage_path() . $fileSystemPath . $d->name);
          }
          $d->profile_id=$profile->id;
          $d->name= $req->file('profilePicture')->getClientOriginalName();
          $d->extension=  $req->file('profilePicture')->getClientOriginalExtension();
          $d->path='/images/profile/' . $d->name;
          $d->save();

          $fileSystemPath='/images/' . $user->id . '/profile/';
          $req->file('profilePicture')->move( storage_path() . $fileSystemPath , $d->name );
          break;
        case 'DO_NOTHING':
          break;
        }

        return redirect()->action('ProfileController@index');
        }

	function storeProfileInfo(Request $req){
        $user=Auth::user();
		$profileInfo = null;
		if( !ProfileInfo::where('user_id', $user->id)->count() ) {
			$profileInfo = new ProfileInfo;
			$profileInfo->user_id=$user->id;
		} else {
			$profileInfo = ProfileInfo::where('user_id', $user->id)->first();
		}

		$profileInfo->bloodType=$req->bloodType;
		$profileInfo->allergies=$req->allergies;
		$profileInfo->implants=$req->implants;
		$profileInfo->vaccines=$req->vaccines;
		$profileInfo->antecedentes=$req->antecedentes;

		$profileInfo->fuma=$req->fuma;
		$profileInfo->bebe=$req->bebe;
		$profileInfo->deporte=$req->deporte;
		$profileInfo->otro=$req->otro;
		$profileInfo->save();

		return redirect()->action('ProfileController@index');
	}
	
	function storeProfileHealthCare(Request $req){
        $userId=Auth::user()->id;
		$profileHealthCare = null;
		if( !profileHealthCare::where('user_id', $userId)->count() ) {
			$profileHealthCare = new profileHealthCare;
			$profileHealthCare->user_id=$userId;
		} else {
			$profileHealthCare = profileHealthCare::where('user_id', $userId)->first();
		}

		$profileHealthCare->name=$req->name;
		$profileHealthCare->plan=$req->plan;
		$profileHealthCare->healthCareId=$req->healthCareId;
		$profileHealthCare->phone=$req->phone;
		$profileHealthCare->web=$req->web;
		$profileHealthCare->save();

		return redirect()->action('ProfileController@index');
	}

	function storeProfileContact(Request $req){
        $userId=Auth::user()->id;
		$profileContact = null;
		if( !profileContact::where('user_id',$userId )->count() ) {
			$profileContact = new profileContact;
			$profileContact->user_id=$userId;
		} else {
			$profileContact = profileContact::where('user_id',$userId )->first();
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
        $userId=Auth::user()->id;
		if( !profileHeadDoctor::where('user_id', $userId)->count() ) {
			$profileHeadDoctor = new profileHeadDoctor;
			$profileHeadDoctor->user_id=$userId;
		} else {
			$profileHeadDoctor = ProfileHeadDoctor::where('user_id', $userId)->first();
		}

		$profileHeadDoctor->name1=$req->name1;
		$profileHeadDoctor->name2=$req->name2;
		$profileHeadDoctor->note1=$req->note1;
		$profileHeadDoctor->note2=$req->note2;
		$profileHeadDoctor->contact1=$req->contact1;
		$profileHeadDoctor->contact2=$req->contact2;
		$profileHeadDoctor->save();

		return redirect()->action('ProfileController@index');
	}
	private function evaluateFile($req){
		$file = $req->profilePicture;
		$isErased = $req->profilePictureErased;

		if( is_null($file) && $isErased ==='true'){// $file==""
			return "DELETE_IMAGE";
		}
		if( is_null($file) && $isErased === 'false' ){// $file == null
			return "DO_NOTHING";
		}
		if(! is_null($file) ){ // $file== uploaded file
			return "SAVE_IMAGE";
		}
	}
	function resume(Request $req){
        if (!Auth::check()) {
            return redirect('/login');
        }
        $userId=Auth::user()->id;

		$phc = ProfileHealthCare::where('user_id', $userId)->first();
		$phc = $phc == null ? new ProfileHealthCare : $phc;

		$phd = profileHeadDoctor::where('user_id', $userId)->first();
        $phd = $phd == null ? new profileHeadDoctor: $phd;

		//$pi = ProfileInfo::where('user_id', $userId)->first();
        //$pi = $pi == null ? new ProfileInfo: $pi;

		$clinicHistory = ClinicHistory::where('user_id', $userId)->first();
		$clinicHistory = $clinicHistory == null ? new ClinicHistory : $clinicHistory;

		$p = Profile::where('user_id', $userId)->first();
        $p = $p == null ? new Profile: $p;

		$dp = DocumentProfile::where('profile_id', $userId)->first();
        $dp = $dp == null ? new DocumentProfile: $dp;

		$pc = ProfileContact::where('user_id', $userId)->first();
		$pc = $pc == null ? new ProfileContact : $pc;

		return view('main.home.resume')
			->with('p', $p)
			->with('phc', $phc)
			->with('pc', $pc)
			->with('pi', $clinicHistory)
			->with('dp', $dp)
			->with('phd', $phd);
    }
}
