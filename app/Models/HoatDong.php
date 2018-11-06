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



      public $relations = [
          'hoatdongtype'
      ];

      public $columns = [
          '*'
      ];

      public $searchColumns = [
          'id',
          'name',
          'desc',
          'from_date',
          'end_date'
      ];

  	/**
  	* Get the hoatdongtype that owns the hoatdong.
  	*/
  	public function hoatdongtype()
  	{
  		return $this->belongsTo('App\Models\HoatDongType');
  	}
}
