<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
	  protected $table = 'lops';

    protected $fillable = [
      'name',
      'desc',
      'khoa_id'
    ];

    public $relations = [
        'khoa'
    ];

    public $columns = [
        '*'
    ];

    public $searchColumns = [
        'id',
        'name',
        'desc'
    ];

  	/**
  	* Get the khoa that owns the lop.
  	*/
  	public function khoa()
  	{
  		return $this->belongsTo('App\Models\Khoa');
  	}

	  /**
     * Get the users for the lop.
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
