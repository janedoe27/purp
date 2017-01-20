<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input, Validator, Redirect;
use App\Interv;
use App\admin\intervs;
use App\admin\profiling;
use App\Http\Requests;
use App\Http\Controllers\controller;

class IntervController extends Controller
{
    //
      public function store(Request $request)
    {
       $Interv = new Interv;
    $Interv->first_name = $request->first_name;
    $Interv->last_name = $request->last_name;
     $Interv->email = $request->email;
     $Interv->tests = $request->tests;
     $Interv->unit = $request->unit;
       $Interv->password = $request->password;
   $Interv->save();


            return Redirect::to('admin/profiling')
                ->with('success','Interv has been saved.');

        
    }

     public function show()
    {
            $Intervs = Interv::Paginate(3);
        return view('admin.intervs', compact('Intervs'));
    }



 public function showprofiling(){
               return view('admin/profiling');
 }

 public function showsette(){
                return view('admin/sette');
 }


}