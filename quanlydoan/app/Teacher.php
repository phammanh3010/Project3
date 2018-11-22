<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $table = 'teacher';

    protected $fillable = ['id_teacher', 'username', 'workplace'];

    protected $primaryKey = 'id_teacher';

    public $timestamps = false;

    public function user(){
        return $this->hasOne('App\User', 'username', 'username');
    }

    public function group(){
        return $this->hasMany('App\Group','id_teacher','id_teacher');
    }
}
