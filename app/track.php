<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class track extends Model
{
    protected $fillable = [
        'name',
        'count',
    ];
}
