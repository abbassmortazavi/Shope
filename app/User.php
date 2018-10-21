<?php

namespace App;

use App\Http\Controllers\Admin\HasRole;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable , HasRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','level' , 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function isAdmin()
    {

        return $this->level == 'admin' ? true : false;
    }

    public function activationCode()
    {
        return $this->hasMany(ActivationCode::class);
    }
}
