<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table = 'student';

    protected $fillable = ['id_student', 'username', 'class'];

    protected $primaryKey = 'id_student';

    public $timestamps = false;

    public function user(){
        return $this->hasOne('App\User', 'username', 'username');
    }

    public function group(){
        return $this->belongsToMany('App\Group', 'group_student','id_student', 'id_group');
    }
}
