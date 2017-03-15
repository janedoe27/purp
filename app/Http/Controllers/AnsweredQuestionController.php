<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\AnsweredQuestion;
use App\Question;
use App\Answer;



class AnsweredQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        try {
            
            $input = $request->all();

            $score = Question::where('id', $input['question'])->value('weight');

            $session = new AnsweredQuestion();

            $is_correct_answer = Answer::where('id', $input['answer'])->value('isCorrect');

            $session->question_id = $request->question;
            $session->answer_id = $request->answer;
            $session->interviewee_id  = Auth::user()->id;

            if($is_correct_answer) {
                $session->score = $score;
            } else {
                $session->score = 0;
            }
            
            $session->save();

            return redirect()->back()->with("teststatus", "Your Answer was submitted successfully."); 
        
        } catch (Exception $e) {

            flash( "You have already submitted an answer for this question.");

            return redirect(); 
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
