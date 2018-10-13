<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoatDong extends Model
{
	protected $table = 'hoatdongs';

    protected $fillable = [
      'name',
      'desc',
      'from_date',
      'end_date',
      'hoatdong_type_id'
    ];

	/**
	* Get the hoatdongtype that owns the hoatdong.
	*/
	public function hoatdongtype()
	{
		return $this->belongsTo('App\Models\HoatDongType');
	}
}
