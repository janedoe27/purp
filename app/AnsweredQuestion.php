<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class AnsweredQuestion extends Model
{
    use Uuids;
    
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    //
    protected $fillable = [
        'question_id', 'answer_id', 'interviewee_id'
    ]; 

    protected $hidden = array('created_at', 'updated_at');

    public static function validator($input){

        $rules = array(
            'question_id' => 'required|question_id',
            'answer_id' => 'required|answer_id',
            'interviewee_id' => 'required|interviewee_id'
        );

        return Validator::make($input,$rules);
    }


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
