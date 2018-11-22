<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $table = 'subject';

    protected $fillable = ['id_subject', 'subject_name'];

    protected $primaryKey = 'id_subject';

    public $timestamps = false;

    public function group(){
        return $this->hasMany('App\Group', 'id_subject', 'id_subject');
    }

    public function subjectScheduel(){
        return $this->hasMany('App\SubjectScheduel', 'id_subject', 'id_subject');
    }
}
