<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoatDongType extends Model
{
	protected $table = 'hoatdong_types';

    protected $fillable = ['type'];

    /**
     * Get the hoatdongs for the hoatdong_type.
     */
    public function hoatdongs()
    {
        return $this->hasMany('App\Models\HoatDong');
    }
}
