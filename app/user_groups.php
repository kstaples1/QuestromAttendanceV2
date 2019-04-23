<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_groups extends Model
{

    protected $primaryKey = 'id_userGroup';

    public function users()
    {
        return $this->belongsToMany('App\User', 'global_user_group', 'id_userGroup','id_user');
    }

    public function enrollment()
    {
        return $this->hasMany('App\enrollment','id_userGroup', 'id_userGroup');
    }
}
