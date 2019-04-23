<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_answers extends Model
{
    public function users()
    {
        return $this->hasOne('App\User','id_user','id_user');
    }

    public function question()
    {
        return $this->hasOne('App\question','id_question','id_question');
    }

    public  function options()
    {
        return $this->hasOne('App\options','id_option','id_option');
    }
}
