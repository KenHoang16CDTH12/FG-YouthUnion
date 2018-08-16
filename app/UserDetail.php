<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
	protected $table = 'user_details';

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
        'user_id'
    ];

    /**
	* Get the user that owns the user_detail.
	*/
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
