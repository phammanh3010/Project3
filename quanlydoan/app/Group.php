<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $table = 'group';

    protected $fillable = ['id_group', 'id_subject', 'id_teacher', 'group_name', 'project_name', 'semester', 'finish_project'];

    protected $primaryKey = 'id_group';

    public $timestamps = false;

    public function teacher(){
        return $this->belongsTo('App\Teacher', 'id_teacher');
    }

    public function student(){
        return $this->belongsToMany('App\Student', 'group_student', 'id_group', 'id_student');
    }

    public function document(){
        return $this->hasMany('App\Document', 'id_group', 'id_group');
    }

    public function evalutionCriteria(){
        return $this->hasMany('App\EvalutionCriteria', 'id_group', 'id_group');
    }

    public function subject(){
        return $this->belongsTo('App\Subject', 'id_subject');
    }

    public function groupScheduel(){
        return $this->hasOne('App\GroupScheduel', 'id_scheduel', 'id_scheduel');
    }
}
