<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'contact_number',
        'email',
        'message',
        'created_at',
        'updated_at',
    ];

    protected $dates = ['deleted_at'];
}
