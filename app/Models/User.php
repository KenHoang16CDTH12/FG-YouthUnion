<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'email',
        'username',
        'password',
        'active',
        'role_id',
        'lop_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the role that owns the user.
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    /**
     * Get the userdetail for the user.
     */
    public function userdetail()
    {
        return $this->belongsTo('App\Models\UserDetail');
    }

    /**
     * Get the class for the user.
     */
    public function lop()
    {
        return $this->belongsTo('App\Models\Lop', 'lop_id');
    }
}
