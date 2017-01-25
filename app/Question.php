<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = [
        'description', 'weight'
    ]; 

    public static function validator($input){

        $rules = array(
            'description' => 'required|description',
            'weight' => 'required|weight'
        );

        return Validator::make($input,$rules);
    }

    public function category(){
	    return $this->hasOne(Category::class);
	}

    public function answers(){
	    return $this->hasMany(Answer::class);
	}
}
