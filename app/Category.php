<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function users(){
        return $this->morphedByMany('App\User','categorable');
    }
    public function markets(){
        return $this->morphedByMany('App\Market','categorable');
    }
}
