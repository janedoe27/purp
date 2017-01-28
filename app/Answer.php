<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $fillable = [
        'description', 'isCorrect', 'question_id'
    ]; 

    protected $attributes = array(
       'isCorrect' => false,
    );
    protected $casts = [
        'isCorrect' => 'boolean'
    ];

    public static function validator($input){

        $rules = array(
            'description' => 'required|description',
            'isCorrect' => 'required|boolean|isCorrect',
        );

        return Validator::make($input,$rules);
    }

    public function question(){
	    return $this->hasOne(Question::class);
	}
}
