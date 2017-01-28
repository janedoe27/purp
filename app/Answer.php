<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $fillable = [
        'description', 'isCorrect'
    ]; 

    protected $attributes = array(
       'isCorrect' => false,
    );

    public static function validator($input){

        $rules = array(
            'description' => 'required|description',
            'isCorrect' => 'required|isCorrect'
        );

        return Validator::make($input,$rules);
    }

    public function question(){
	    return $this->hasOne(Question::class);
	}
}
