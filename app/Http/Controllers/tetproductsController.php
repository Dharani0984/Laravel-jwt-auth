<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product;

class tetproductsController extends Controller
{
	public $successStatus = 200;

    function index(){
    	$products =  Product::all();
    	return response()->json(['Products' => $products], $this->successStatus);
    }
}
