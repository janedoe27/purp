<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name', 'description'];

    public static function validator($input){

        $rules = array(
            'description' => 'required|description',
            'name' => 'unique|name'
        );

        return Validator::make($input,$rules);
    }
    
    public function questions()
	{
	    return $this->hasMany(Question::class);
	}

}
