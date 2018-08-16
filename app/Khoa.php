<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
	protected $table = 'khoas';
    
    protected $fillable = [
      'name',
      'desc',
      'lcdoan_id'
    ];

    /**
     * Get the lops for the khoa.
     */
    public function lops()
    {
        return $this->hasMany('App\Lop');
    }

	/**
	* Get the lcdoan that owns the khoa.
	*/
	public function lcdoan()
	{
		return $this->belongsTo('App\LCDoan');
	}
}
