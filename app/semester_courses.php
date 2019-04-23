<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class semester_courses extends Model
{
    protected $primaryKey = 'id_section';

    /** This is the One to Many relationships **/

    public function users()
    {
        return $this->belongsTo('App\User','id_creator','id_user');
    }

    public function master_courses()
    {
        return $this->belongsTo('App\master_courses','id_master','id_master');
    }

    /** This is the many to one relationships **/

    public function enrollment()
    {
        return $this->hasMany('App\enrollment','id_section', 'id_section');
    }

    public function quiz()
    {
        return $this->hasMany('App\quiz','id_section','id_section');
    }

}
