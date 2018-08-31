<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHoatDong extends Model
{
	protected $table = 'user_hoatdongs';

    protected $fillable = [
        'user_id',
		'hoatdong_id',
		'status'
    ];

	/**
	* Get the user that owns the user_hoatdong.
	*/
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	/**
	* Get the hoatdong that owns the user_hoatdong.
	*/
	public function hoatdong()
	{
		return $this->belongsTo('App\HoatDong');
	}   
}
