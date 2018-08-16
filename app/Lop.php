<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
	protected $table = 'classes';
    
    protected $fillable = [
      'name',
      'desc',
      'khoa_id'
    ];

	/**
	* Get the khoa that owns the lop.
	*/
	public function khoa()
	{
		return $this->belongsTo('App\Khoa');
	}

	/**
     * Get the users for the lop.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
