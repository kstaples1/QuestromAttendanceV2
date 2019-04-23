<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class enrollment extends Model
{
    protected $table = 'enrollment';

    protected $primaryKey = 'id_enrollment';

    public function semester_courses()
    {
        return $this->belongsTo('App\semester_courses','id_section','id_section');
    }

    public function users()
    {
        return $this->belongsTo('App\User','id_user','id_user');
    }

    public function userGroup()
    {
        return $this->belongsTo('App\user_groups','id_userGroup','id_userGroup');
    }

    public function user_quizes($id_section)
    {
        $quizes = enrollment::where('id_user','=', auth::user()->id_user)
            ->semester_courses()
            ->join('quiz','semester_courses.id_section','=','quiz.id_section')
            ->where('quiz.id_section','=', $id_section);
        return $quizes;
    }

}
