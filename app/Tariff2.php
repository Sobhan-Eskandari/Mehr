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

    /**
     * relation to tariff category
     */
    public function tariffs(){
        return $this->belongsToMany('App\Tariff');
    }

    /**
     * relation to markets
     */
    public function markets(){
        return $this->belongsToMany('App\Market');
    }
}
