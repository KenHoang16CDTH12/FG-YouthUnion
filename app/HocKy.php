<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocKy extends Model
{
	protected $table = 'hockys';
    
    protected $fillable = [
      'hocky',
      'namhoc_id'
	];

    /**
     * Get the namhoc that owns the hocky.
     */
    public function namhoc()
    {
        return $this->belongsTo('App\NamHoc');
    }
}
