<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'roles';

    protected $fillable = ['type'];

    public $incrementing = false;

    public $relations = [];

    public $columns = [
        '*'
    ];

    public $searchColumns = [
        'id',
        'type'
    ];
    /**
     * Get the users for the role.
     */
    public function users()
    {
        return $this->hasMany('App\Models\Role');
    }

}
