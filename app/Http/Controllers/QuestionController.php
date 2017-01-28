<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;


use App\Question;
use App\Category;


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

        $categories = Category::all();
        $questions = Question::all();

        if (!$categories->count()) {
            return redirect()->action('CategoryController@admin')->with("status", "You must have at least one category before you can add a question.");
        }

        $locals = [
            'questions' => $questions,
            'categories' => $categories
        ];
        
        return view('admin.questions.index', $locals);
    }

    /**
     * Create New Question
     *
     * @return Response
     */
    public function new(Request $request)
    {
        $input = $request->all();

        $question = new Question([
            'description' => $input['description'],
            'weight' => $input['weight'],
            'category_id' => $input['category']
        ]);

        $question->save();

        foreach ($input['answers'] as $answer) {

            $answer['isCorrect'] = (array_key_exists('isCorrect', $answer) ? true : false);

            $question->answers()->create($answer);
        }

        return redirect()->back()->with("status", "Question created successfully.");
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
    public function index(Request $request)
    {   

        return Question::with('answers')->paginate(1);
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
        $question = Question::find($id);

        $question->delete();

        return redirect()->back()->with("status", "Question deleted successfully.");
    }
}
