<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
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
     * Display a question view
     *
     * @return Response
     */
    public function admin()
    {
        $questions = Question::all();
        Log::info($questions);
        return view('admin.questions.index', ['questions' => $questions]);
    }

    /**
     * Create New Question
     *
     * @return Response
     */
    public function new()
    {
        return array(
          1 => "John",
          2 => "Mary",
          3 => "Steven"
        );
    }


    /**
     * Import Questions from CSV.
     *
     * @return Response
     */
    public function import()
    {
        return array(
          1 => "John",
          2 => "Mary",
          3 => "Steven"
        );
    }

    /**
     * Display a listing of the resource
     *
     * @return Response
     */
    public function index()
    {
        return array(
          1 => "John",
          2 => "Mary",
          3 => "Steven"
        );
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
