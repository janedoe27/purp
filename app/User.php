<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'is_staff', 'is_interv', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    public function setNameAttribute($tests1)
    {
        $this->attributes['name'] = trim($tests1) !== '' ? $tests1 : null;
    }

    public function setNumberAttribute($tests2)
    {
        $this->attributes['number'] = trim($tests2) !== '' ? $tests2: null;
    }

    public function setDescriptionAttribute($tests3)
    {
        $this->attributes['description'] = trim($tests3) !== '' ? $tests3 : null;
    }
}
