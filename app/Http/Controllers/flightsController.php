<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flights;

class flightsController extends Controller
{
	public $successStatus = 200;

    public function index(){

    	$flights = Flights::all();
    	//print_r($flights);
    	return response()->json(['Flights'=> $flights], $this->successStatus);
    }
}
