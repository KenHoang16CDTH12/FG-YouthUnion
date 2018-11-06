<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LCDoanHoatDong extends Model
{
	  protected $table = 'lcdoan_hoatdongs';

    protected $fillable = [
      'hoatdong_id',
      'lcdoan_id'
    ];

    public $relations = [
        'hoatdong',
        'lcdoan'
    ];

    public $columns = [
        '*'
    ];

    public $searchColumns = [
        'hoatdong_id',
        'lcdoan_id'
    ];

    public function checkExistsObject($params) {
        // Return object
        $object = LCDoanHoatDong::where('lcdoan_id', $params['lcdoan_id'])
                            ->where('hoatdong_id', $params['hoatdong_id'])
                            ->first();
        return $object;
    }


    /**
  	* Get the lcdoan that owns the lcdoan_hoatdong.
  	*/
  	public function lcdoan()
  	{
  		return $this->belongsTo('App\Models\LCDoan');
  	}

  	/**
  	* Get the hoatdong that owns the lcdoan_hoatdong.
  	*/
  	public function hoatdong()
  	{
  		return $this->belongsTo('App\Models\HoatDong');
  	}
}
