<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Barbers;
use Validator;

class BarbersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barbers = Barbers::latest()->paginate(5);
        $approve = Barbers::where('status','0')->latest()->paginate(5);
        $approved = Barbers::where('status','1')->latest()->paginate(5);
        return view('home', compact('barbers','approve','approved'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
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
        
        $barbers = $request->all();
        $validator = $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric|min:10',
            'email' => 'required|email',
            'address' => 'required',
            'photo' => 'required'
        ]);

        

        if (Barbers::where('id', $barbers['id'])->exists()) {

           if(!empty($barbers['photo'])){ 
               if ($image = $barbers['photo']) {
                $destinationPath = 'photo/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $barbers['photo'] = $profileImage;
            }
        }else{
            $profileImage = "";
        }
        $res = Barbers::where('id',$barbers['id'])->update(
            [
               'name'=>$barbers['name'],
               'phone'=>$barbers['phone'],
               'email'=>$barbers['email'],
               'address'=>$barbers['address'],
               'photo'=>$profileImage
           ]);
        return redirect("/home");
    }else{
        $barbers = $request->all();
        if ($image = $request->file('photo')) {
            $destinationPath = 'photo/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $barbers['photo'] = $profileImage;
        }
        Barbers::create($barbers);
        return redirect("/home");
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $edit_barbers = Barbers::where('id',$id)->first()->toArray();
        $barbers = Barbers::latest()->paginate(5);
        $approve = Barbers::where('status','0')->latest()->paginate(5);
        $approved = Barbers::where('status','1')->latest()->paginate(5);
        return view('home', compact('edit_barbers', 'barbers','approve','approved'))->with('i', (request()->input('page', 1) - 1) * 3);
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
        $barbers = Barbers::find($id);
        $barbers = $request->input('status');
        $res = Barbers::where('id',$id)->update(
            [ 'status'=>"0"
        ]);
        return redirect("/home");
    }

    public function update1(Request $request, $id)
    {
        $barbers = Barbers::find($id);
        $barbers = $request->input('status');
        $res = Barbers::where('id',$id)->update(
            [ 'status'=>"1"
        ]);
        return redirect("/home");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $barbers = Barbers::find($id);
       $barbers->delete();
       return redirect("/home");
   }
}
