<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * relation to users
     */
    public function users(){
        return $this->morphedByMany('App\User','categorable');
    }

    /**
     * relation to markets
     */
    public function markets(){
        return $this->morphedByMany('App\Market','categorable');
    }
}
