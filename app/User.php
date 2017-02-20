<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'systemic_code',
        'first_name',
        'last_name',
        'social_security_number',
        'education',
        'occupation',
        'state',
        'city',
        'address',
        'zip',
        'home_tel',
        'work_tel',
        'emergency_tel',
        'cell_1',
        'cell_2',
        'email',
        'bank_name',
        'bank_card_number',
        'bank_account_number',
        'zhenic_card_number',
        'marketer',
        'acquainted_by',
        'text',
        'creator_id',
        'editor_id',
        'role',
        'password',
        'last_logged_in_at',
        'created_at',
        'updated_at',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function categories(){
        return $this->morphToMany('App\Category','categorable');
    }


    public function regTypes(){
        return $this->morphToMany('App\RegType','reg_typeable');
    }
    
    public function markets(){
        return $this->hasMany('App\Market');
    }
}
