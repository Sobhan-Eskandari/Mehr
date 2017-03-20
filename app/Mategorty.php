<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mategorty extends Model
{
    protected $fillable =[
        /*
         * ارایه حاوی فلید های قابل پر شدن در دیتا بیش
         */
        'name'
    ];
    public function markets(){
        /*
         * این مدل با مدل market به صورت چند به رابطه دارد
         */
        return $this->belongsToMany('App\Market');
    }
}
