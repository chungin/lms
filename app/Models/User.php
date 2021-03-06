<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_user';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
    //  */
    protected $fillable = [
        'fname','lname','dob', 'email', 'username', 'role','center','password',
    ];

    // *
    //  * The attributes that should be hidden for arrays.
    //  *
    //  * @var array
     
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function usercenteraccessbility()
    // {
    //     return $this->belongsToMany('App\Models\UserCenterAccessibility');
    // }

    public function center()
    {
        return $this->belongsToMany('App\Models\Center','tb_user_center_accessibility','user_id','center_id')->withPivot('center_accessibility_id');
    }

}
