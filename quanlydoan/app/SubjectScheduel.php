<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectScheduel extends Model
{
    //
    protected $table = 'subject_scheduel';

    protected $fillable = ['id_subject_scheduel', 'id_subject', 'semester'];
    
    protected $primaryKey = 'id_subject_scheduel';

    public $timestamps = false;

    public function subject(){
        return $this->belongsTo('App\Subject', 'id_subject');
    }

    public function content(){
        return $this->hasMany('App\ContentSubjectScheduel', 'id_subject_scheduel', 'id_subject_scheduel');
    }
}
