<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHoatDong extends Model
{
	protected $table = 'user_hoatdongs';

    protected $fillable = [
        'user_id',
				'hoatdong_id',
    ];

	/**
	* Get the user that owns the user_hoatdong.
	*/
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
	/**
	* Get the hoatdong that owns the user_hoatdong.
	*/
	public function hoatdong()
	{
		return $this->belongsTo('App\Models\HoatDong');
	}
}
