<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    protected $fillable = [
        'name'
    ];
    public function tariff2s(){
        return $this->belongsToMany('App\Tariff2');
    }
}
