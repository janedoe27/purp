<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interv extends Model
{
    // 
protected $connection = 'mysql';
 protected $table = 'Intervs';

        protected $fillable = [
        'first_name', 'last_name', 'email', 'tests', 'unit', 'password', 'score',
    ]; 

    public static function validator($input){

        $rules = array(
            'first_name'    =>'required|first_name',
            'last_name'    =>'required|last_name',
            'email'    =>'required|email',
            'tests'    =>'required|tests',
            'unit'    =>'required|unit',
            'password'    =>'required|password',
        );

        return Validator::make($input,$rules);
    }
}
