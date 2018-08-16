<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoatDong extends Model
{
	protected $table = 'hoatdongs';
    
    protected $fillable = [
      'name',
      'desc',
      'from_date',
      'end_date',
      'hocky_id',
      'hoatdong_type_id'
    ];

	/**
	* Get the hocky that owns the hoatdong.
	*/
	public function hocky()
	{
		return $this->belongsTo('App\HocKy');
	}     
	/**
	* Get the hoatdongtype that owns the hoatdong.
	*/
	public function hoatdongtype()
	{
		return $this->belongsTo('App\HoatDongType');
	} 
}
