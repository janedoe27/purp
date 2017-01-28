<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input, Validator, Redirect;
use App\questtest;
use App\Question;
use App\app;
use App\Http\Requests;
use App\Http\Controllers\controller;

class TestController extends Controller
{
    //
     public function store(Request $request)
    {
      $questtest = new Questtest;
      $questtest->question = $request->question;
      $questtest->answer1 = $request->answer1;
      $questtest->correct = $request->correct;
      $questtest->answer3 = $request->answer3;
      $questtest->unit = $request->unit;
      $questtest->point = $request->point;
      $questtest->save();


            return Redirect::to('admin/sette')
                ->with('success','Question has been saved.');

        
    }

    public function new()
    {

       return view('app')->with('questtests',Question::simplePaginate(1));
    }


    public function show()
    {

       return View::make ('app')
           ->with('questtests',Questtest::all());
    }

    public function art($id)
    {
        $questtest = Questtest::find($id);

        $previous = Questtest::where('id', '<', $questtest->id)->max('id');
        $next = Post::where('id', '>', $questtest->id)->min('id');

    return view('app')->with('previous', $previous)->with('next', $next);
    }
}
