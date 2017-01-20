<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questtest extends Model
{
    //
    protected $connection = 'mysql';
 protected $table = 'questtests';

        protected $fillable = [
        'question', 'answer', 'unit', 'point',
    ];

    public static function validator($input){

        $rules = array(
            'question'    =>'required|question'
        );

        return Validator::make($input,$rules);
    }
}
