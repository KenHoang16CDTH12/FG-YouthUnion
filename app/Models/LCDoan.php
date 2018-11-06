<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LCDoan extends Model
{
    protected $table = 'lcdoans';

    protected $fillable = [
      'name',
      'desc'
    ];

    public $relations = [];

    public $columns = [
        '*'
    ];

    public $searchColumns = [
        'id',
        'name',
        'desc'
    ];

    /**
     * Get the khoas for the lcdoan.
     */
    public function khoas()
    {
        return $this->hasMany('App\Models\Khoa');
    }

    /**
     * Get the lcdoan_hoatdongs for the lcdoan.
     */
    public function lcdoan_hoatdongs()
    {
        return $this->hasMany('App\Models\LCDoanHoatDong');
    }
}
