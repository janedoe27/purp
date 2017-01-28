<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnsweredQuestion extends Model
{
    //
    protected $fillable = [
        'question_id', 'answer_id', 'interviewee_id'
    ]; 

    public function question(){
	    return $this->hasOne(Question::class);
	}
    public function answer(){
	    return $this->hasOne(Answer::class);
	}
    public function interviewee(){
	    return $this->hasOne(Interv::class);
	}
}
