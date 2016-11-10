<?php

namespace clinica\Http\Controllers;

use Illuminate\Http\Request;

use clinica\Http\Requests;
use clinica\ClinicHistory;
use clinica\Misc;
use clinica\Admittion;
use clinica\Medication;

use Log;
use Auth;

class ClinicHistoryController extends Controller
{
    function index(){
        $userId = Auth::user()->id;

        $ch = ClinicHistory::where('user_id',$userId);
        $ch = !$ch->count() ? new ClinicHistory() : $ch->first();

        $admittions = Admittion::where('user_id',$userId)->get();
        $medications = Medication::where('user_id',$userId)->get();

		return view('main.clinicHistory.index')
			->with('m', $ch)
			->with('admittions', $admittions)
			->with('medications', $medications)
			->with('ch', $ch);
    }

    function storeGeneral(Request $req){
        $userId = Auth::user()->id;
        $ch = ClinicHistory::where('user_id',$userId);
        $ch = !$ch->count() ? new ClinicHistory() : $ch->first();

        $ch->user_id=$userId;
        $ch->diseases=$req->diseases;
        $ch->allergies=$req->allergies;
        $ch->implants=$req->implants;
        $ch->vaccines=$req->vaccines;
        $ch->save();
        return redirect()->action('ClinicHistoryController@index');
    }

    function storeAdmittion(Request $r){
        $admittion = new Admittion();
        $admittion->user_id = Auth::user()->id;
        $admittion->description = $r->title;
        $admittion->date = $r->date;
        $admittion->save();
        return redirect()->action('ClinicHistoryController@index');
    }

    function updateAdmittion($id, Request $r){
        $admittion = Admittion::findOrFail($id);
        $admittion->description = $r->title;
        $admittion->date = $r->date;
        $admittion->save();
        return redirect()->action('ClinicHistoryController@index');
    }

    function destroyAdmittion($id){
        Admittion::destroy($id);
        return redirect()->action('ClinicHistoryController@index');
    }

    function storeMedication(Request $r){
        $medication = new Medication();
        $medication->user_id = Auth::user()->id;
        $medication->name = $r->name;
        $medication->drug = $r->drug;
        $medication->posology = $r->posology;
        $medication->save();
        return redirect()->action('ClinicHistoryController@index');
    }
    
    function updateMedication($id, Request $r){
        $m = Medication::findOrFail($id);
        $m->name = $r->name;
        $m->drug = $r->drug;
        $m->posology = $r->posology;
        $m->save();
        return redirect()->action('ClinicHistoryController@index');
    }

    function destroyMedication($id){
        Medication::destroy($id);
        return redirect()->action('ClinicHistoryController@index');
    }
}
