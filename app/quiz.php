<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
    protected $table = 'quiz';

    protected $primaryKey = 'id_quiz';

    public function semester_courses()
    {
        return $this->belongsTo('App\semester_courses','id_section','id_section');
    }

    public function question()
    {
        return $this->hasMany('App\question','id_quiz','id_quiz');
    }

    public function master_courses()
    {
        return $this->semester_courses()->join('master_courses','master_courses.id_master','=','semester_courses.id_master')->first();
    }

    public function options()
    {
        return $this->question()->join('options','question.id_question','=','options.id_question')->get();
    }

}
