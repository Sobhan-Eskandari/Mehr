<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FAQ extends Model
{
    use SoftDeletes;

    protected $fillable = [
        /*
         * ارایه حاوی فیلد های لازم به پر شدن
         */
        'question',
        'answer',
    ];
}
