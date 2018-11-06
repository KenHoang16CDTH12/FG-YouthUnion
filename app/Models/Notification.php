<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	protected $table = 'notifications';

    protected $fillable = [
        'user_id',
        'title',
        'message',
        'type',
        'redirect',
        'status'
    ];

    public $relations = [
        'user'
    ];

    public $columns = [
        '*'
    ];

    public $searchColumns = [
        'id',
        'title',
        'message',
        'type'
    ];

    /**
    * Get the user that owns the notification.
    */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
