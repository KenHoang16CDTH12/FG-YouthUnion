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

    public $relations = [
        'user',
        'hoatdong'
    ];

    public $columns = [
        '*'
    ];

    public $searchColumns = [
        'id',
        'user_id',
        'hoatdong_id'
    ];



    public function checkExistsObject($params) {
        // Return object
        $object = UserHoatDong::where('user_id', $params['user_id'])
                            ->where('hoatdong_id', $params['hoatdong_id'])
                            ->first();
        return $object;
    }

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
