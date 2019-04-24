<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'BUID','firstName','lastName','userName', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /** This is where we make connections to the different tables **/

    protected $primaryKey = 'id_user';

    public function user_groups()
    {
        return $this->belongsToMany('App\user_groups', 'global_user_group','id_user','id_userGroup');
    }

    public function master_courses()
    {
        return $this->belongsToMany('App\master_courses', 'semester_courses','id_master','id_master');
    }

    public function semester_courses()
    {
        return $this->hasMany('App\semester_courses','id_user','id_creator');
    }

    public function enrollment()
    {
        return $this->hasMany('App\enrollment','id_user', 'id_user');
    }

    public function student_answers()
    {
        return $this->hasOne('App\student_answers','id_user','id_user');
    }



}
