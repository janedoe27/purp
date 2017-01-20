<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\questtest;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app');
       /** $questest = question::all();

        return view('app', compact('questest'))  */
    }

     public function get_view($id)
    {

      return View::make('app')
          ->with('tittle', 'Question View Page')
          ->with('question', Question::find($id));
    }
}
