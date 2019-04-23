<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $table = 'question';

    protected $primaryKey = 'id_question';

    public function quiz()
    {
        return $this->belongsTo('App\quiz','id_quiz','id_quiz');
    }

    public function options()
    {
        return $this->hasMany('App\options','id_question','id_question');
    }

    public function student_answers()
    {
        return $this->hasOne('App\student_answers','id_question','id_question');
    }
}
