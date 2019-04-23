<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class global_user_group extends Model
{
    protected $table = 'global_user_group';

    protected $fillable = [
        'id_userGroup','id_user',
    ];

    public function user()
    {
        return $this->belongsTo('User','id_user','id_user');
    }

    public function userGroup()
    {
        return $this->belongsTo('user_groups','id_userGroup','id_userGroup');
    }
}
