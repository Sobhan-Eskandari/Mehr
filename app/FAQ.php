<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FAQ extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'question',
        'answer',
    ];
}
