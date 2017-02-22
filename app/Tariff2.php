<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tariff2 extends Model
{
    protected $fillable = [
        'name',
        'cost',
        'desc'
    ];
    public function tariffs(){
        return $this->belongsToMany('App\Tariff');
    }
    public function markets(){
        return $this->belongsToMany('App\Market');
    }
}
