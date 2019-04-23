<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_courses extends Model
{


    protected $primaryKey = 'id_master';

    public function semester_courses()
    {
        return $this->hasMany('App\semester_courses','id_master','id_master');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'semester_courses', 'id_master','id_master');
    }


}
