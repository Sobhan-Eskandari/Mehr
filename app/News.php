<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;
/*
 * مدل خبر برای دسترسی به دیتا بیس
 */
    protected $fillable = [
        'title',
        'body',
    ];

    protected $dates = ['deleted_at'];
}
