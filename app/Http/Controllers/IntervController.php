<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input, Validator, Redirect;
use App\Interv;
use App\User;
use App\Question;
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

     public function show(Request $request)
    {

        $users = Session::join('users', 'users.id', '=', 'sessions.interviewee_id')
            ->join('questions', 'questions.id', '=', 'sessions.question_id')
            ->join('answers', 'answers.id', '=', 'sessions.answer_id')
            ->selectRaw('users.id, first_name, last_name, count(sessions.question_id) as num_question_answered, count(case answers.isCorrect when true then 1 else null end ) as correct_answers, sum(score) as total_score')
            ->where('interviewee_id', $request->user()->id)
            ->groupBy('sessions.id', 'users.id', 'first_name', 'last_name')
            ->paginate(50);

        $question = Question::selectRaw('count(id) as total_questions, sum(weight) as max_score')->first();

        // return $question;

        return view ('admin.intervs', compact('users', 'question'));
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