<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    protected $fillable = [
        'address',
        'contact_tel',
        'telegram',
        'instagram',
    ];


    public function photos(){
        return $this->morphToMany('App\Photo', 'photoable');
    }
}
