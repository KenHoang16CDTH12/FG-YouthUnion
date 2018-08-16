<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'roles';
    
    protected $fillable = ['type'];
    
    /**
     * Get the users for the role.
     */
    public function users()
    {
        return $this->hasMany('App\Role');
    }

}
