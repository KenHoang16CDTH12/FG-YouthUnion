<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NamHoc extends Model
{
	protected $table = 'namhocs';
    
    protected $fillable = ['nam_hoc'];

    /**
     * Get the hockys for the namhoc.
     */
    public function hockys()
    {
        return $this->hasMany('App\HocKy');
    }
}
