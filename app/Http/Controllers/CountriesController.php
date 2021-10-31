<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB; 



use App\ContriesModel;
use validater;



class CountriesController extends Controller
{
        public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = ContriesModel::orderBy('id')->get()->all();
        return response()->json(['countries'=>$countries],$this->successStatus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
        $countries = new ContriesModel();

        /*$validated = $request->validate([
        'country_name' => 'required',
    ]);*/

        $countries->country_name = $request->input('country_name');
        $countries->save();
        return response()->json(['status'=>'true','message'=>'Records inserted successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!empty($id)){
            $countries = new ContriesModel();
           // $countries = ContriesModel::find($id);
            $countries = ContriesModel::select('*')->where(['id'=>$id])->get();
            return response()->json(['countries'=>$countries],$this->successStatus);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        if(!empty($id)){
        $countries = new ContriesModel();
        $countries->country_name = $request->input('country_name');
        $res = ContriesModel::where('id',$id)->update(
        [
            'country_name'=>$countries->country_name
        ]);
        return response()->json(['status'=>'true','message'=>'Records updated successfully.']);
    }
        

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!empty($id)){
            $countries = new ContriesModel();
            $countries = ContriesModel::find($id);
            $countries->delete();
            return response()->json(['status'=>'true','message'=>'Record deleted successfully']);
        }

    }
}
