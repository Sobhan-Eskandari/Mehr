<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Market extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'systemic_code',
        'user_id',
        'market_name',
        'state',
        'city',
        'address',
        'market_tel',
        'zip',
        'longitude',
        'latitude',
        'normal_percentage',
        'special_percentage',
        'special_percentage_start',
        'special_percentage_end',
        'contract_start',
        'contract_end',
        'pos',
        'marketer',
        'acquainted_by',
        'text',
        'creator_id',
        'editor_id',
        'start',
        'end',
        'point',
        'market_type',
        'created_at',
        'updated_at',
    ];

    public function categories(){
        return $this->morphToMany('App\Category','categorable');
    }

    public function regTypes(){
        return $this->morphToMany('App\RegType', 'reg_typeable');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function mategories(){
        return $this->belongsToMany('App\Mategorty');
    }
    public function photos(){
        return $this->morphToMany('App\Photo', 'photoable');
    }
    public function logo(){
        return $this->hasOne('App\logo');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
