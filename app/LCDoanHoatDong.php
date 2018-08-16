<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LCDoanHoatDong extends Model
{
	protected $table = 'lcdoan_hoatdongs';
    
    protected $fillable = [
      'hoatdong_id',
      'lcdoan_id'
    ];

    /**
	* Get the lcdoan that owns the lcdoan_hoatdong.
	*/
	public function lcdoan()
	{
		return $this->belongsTo('App\LCDoan');
	}
	
	/**
	* Get the hoatdong that owns the lcdoan_hoatdong.
	*/
	public function hoatdong()
	{
		return $this->belongsTo('App\HoatDong');
	}
}
