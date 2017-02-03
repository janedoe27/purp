<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input, Validator, Redirect;
use App\Interv;
use App\User;
use App\AnsweredQuestion as Session;
use App\admin\intervs;
use Illuminate\Support\Facades\DB;
use App\admin\profiling;
use App\Http\Requests;
use App\Http\Controllers\controller;

class IntervController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
        ]);
    }

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

        return Redirect::to('app/interviews')->with('success','Interv has been saved.');

        
    }
    //
      public function register(Request $request)
    {
        $user = new User();
        
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;

        $user->password = bcrypt('CBT1234@@');

        $user->save();

        return redirect()->back()->with('status','Candidate record have been saved.');

        
    }

     public function show()
    {

        // $intervs = Session::distinct('interviewee_id')
        // $intervs = Session::select(DB::raw('count(*) as completed, '))->whereExists(function($query) {
        // $intervs = Session::whereExists(function($query) {
        //     $query->select(DB::raw(1))
        //         ->from('answers')
        //         ->whereRaw('answers.question_id = sessions.question_id and answers.id = sessions.answer_id');
        // })->join('users', function($join) {
        //     $join->on('users.id', '=', 'interviewee_id');
        // })->paginate(50);

        // // return $intervs;
        // return view('admin.intervs', compact('intervs'));


        // $users = DB::table('users')->where('role', '1')->get();

$users = DB::table('users')
            ->join('sessions', 'interviewee_id', '=', 'sessions.interviewee_id')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'score', 'answer_id')
            // ->select (DB::raw('sum(score) as total'))
            ->get();

        // return $users;
        return view ('admin.intervs', compact('users'));
    }

     public function report()
    {
        $intervs = Interv::Paginate(3);
        return view('admin.intervs', compact('intervs'));
    }



 public function showprofile(){
               return view('admin/profiling');
 }

 public function showsetting(){
                return view('admin/sette');
 }


}