<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HoatDong extends Model
{
    protected $table = 'hoatdongs';

    protected $fillable = [
        'name',
        'desc',
        'from_date',
        'end_date',
        'hoatdongtype_id',
        'image'
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

    protected $appends = ['hoatdong_image_url'];

    public function getHoatDongImageUrlAttribute()
    {
        return Storage::url('hoatdongimage/' . $this->id . '/default.png');
    }

    /**
     * Get the hoatdongtype that owns the hoatdong.
     */
    public function hoatdongtype()
    {
        return $this->belongsTo('App\Models\HoatDongType');
    }
}
