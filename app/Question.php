<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use Uuids;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    

    protected $fillable = [
        'description', 'weight', 'category_id'
    ]; 

    protected $hidden = array('created_at', 'updated_at');

    public static function validator($input){

        $rules = array(
            'description' => 'required|description',
            'weight' => 'required|weight',
            'category_id' => 'required|category_id'
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
