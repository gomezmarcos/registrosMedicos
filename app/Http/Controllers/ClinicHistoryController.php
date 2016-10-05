<?php

namespace clinica\Http\Controllers;

use Illuminate\Http\Request;

use clinica\Http\Requests;
use clinica\ClinicHistory;
use clinica\Misc;
use clinica\Admittion;
use clinica\Medication;

class ClinicHistoryController extends Controller
{
    function index(){
    	$clinicHistory = new ClinicHistory();
    	$admittion1 = new Admittion;
    	$admittion1->id=100;
    	$admittion1->description='puto';
    	$admittion2 = new Admittion;
    	$admittion2->id=101;
    	$admittion2->description='el que lee';
    	$medication1 = new Medication();
    	$medication1->id=1001;
    	$medication1->name='una buena';
    	$medication1->drug='crack lvl2';
    	$medication1->posology='cada 24 horas';
    	$medication2 = new Medication();
    	$medication2->id=1002;
    	$medication2->name='una mala';
    	$medication2->drug='crack';
    	$medication2->posology='cada 8 horas';
		return view('main.clinicHistory.index')
			->with('m', $clinicHistory)
			->with('admittions', [$admittion1, $admittion2])
			->with('medications', [$medication1, $medication2])
			->with('ch', $clinicHistory);
    }
    //
}
