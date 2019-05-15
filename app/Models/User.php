<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
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
        'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $relations = [
        'role'
    ];

    public $columns = [
        '*'
    ];

    public $searchColumns = [
        'id',
        'email',
        'username'
    ];

    protected $appends = ['user_image_url'];

    public function getUserImageUrlAttribute()
    {
        return Storage::url('userimage/' . $this->id . '/default.png');
    }

    /**
     * Get the role that owns the user.
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
}
