<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class options extends Model
{
    protected $table = 'options';

    protected $primaryKey = 'id_option';

    public function question()
    {
        return $this->belongsTo('App\question','id_question','id_question');
    }

    public function student_answers()
    {
        return $this->hasOne('App\student_answers','id_option','id_option');
    }


}
