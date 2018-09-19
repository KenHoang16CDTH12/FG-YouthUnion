<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
	protected $table = 'user_details';
    public $incrementing = false;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'date_of_birth',
        'phone',
        'address',
        'photo',
        'student_code',
        'user_id',
        'lop_id'
    ];

    /**
	* Get the user that owns the user_detail.
	*/
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
}
