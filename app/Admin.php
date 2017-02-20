<?php

namespace App;

use App\Notifications\AdminResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
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
        'creator_id',
        'editor_id',
        'create_user',
        'edit_user',
        'delete_user',
        'create_admin',
        'edit_admin',
        'delete_admin',
        'create_market',
        'edit_market',
        'delete_market',
        'create_news',
        'edit_news',
        'delete_news',
        'view_message',
        'password',
        'last_logged_in_at',
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

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPassword($token));
    }

    public function CreateCustomer(){

        if($this->create_user == 1){
            return true;
        }

        return false;

    }

    public function EditCustomer(){

        if($this->edit_user == 1){
            return true;
        }

        return false;

    }

    public function DeleteCustomer(){

        if($this->delete_user == 1){
            return true;
        }

        return false;

    }

    public function CreateMarket(){

        if($this->create_market == 1){
            return true;
        }

        return false;

    }

    public function EditMarket(){

        if($this->edit_market == 1){
            return true;
        }

        return false;

    }

    public function DeleteMarket(){

        if($this->delete_market == 1){
            return true;
        }

        return false;

    }

    public function CreateAdmin(){

        if($this->create_admin == 1){
            return true;
        }

        return false;

    }

    public function EditAdmin(){

        if($this->edit_admin == 1){
            return true;
        }

        return false;

    }

    public function DeleteAdmin(){

        if($this->delete_admin == 1){
            return true;
        }

        return false;

    }

    public function CreateNews(){

        if($this->create_news == 1){
            return true;
        }

        return false;

    }

    public function EditNews(){

        if($this->edit_news == 1){
            return true;
        }

        return false;

    }

    public function DeleteNews(){

        if($this->delete_news == 1){
            return true;
        }

        return false;

    }

    public function ViewMessage(){

        if($this->view_message == 1){
            return true;
        }

        return false;

    }
}
