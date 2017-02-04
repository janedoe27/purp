<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Question;
use App\AnsweredQuestion as Session;
use Charts;

class ChartsController extends Controller
{
        public function chart(Request $request){


        $users = Session::join('users', 'users.id', '=', 'sessions.interviewee_id')
            ->join('questions', 'questions.id', '=', 'sessions.question_id')
            ->join('answers', 'answers.id', '=', 'sessions.answer_id')
            ->selectRaw('users.id, first_name, last_name, count(sessions.question_id) as num_question_answered, count(case answers.isCorrect when true then 1 else null end ) as correct_answers, sum(score) as total_score')
            ->where('interviewee_id', $request->user()->id)
            ->groupBy('sessions.id', 'users.id', 'first_name', 'last_name')
            ->get();

    	$chart =Charts::database($users, 'bar', 'highcharts')
    			->data(Question::selectRaw('sum(weight) as weight')->get())
    			->dateColumn('weight')
                ->title('Analytics')
                ->elementLabel('Score')
                ->dimensions(2000,1000)
                ->groupBy('num_question_answered')
                ->responsive(true);

  return view('/admin/report', ['chart' => $chart]);
}

}