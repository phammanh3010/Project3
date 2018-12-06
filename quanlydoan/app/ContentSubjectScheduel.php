<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentSubjectScheduel extends Model
{
    //
    protected $table = 'content_sub_scheduel';

    protected $fillable = ['id_content_scheduel', 'id_subject_scheduel', 'time_deadline', 'require', 'penalty'];

    protected $primaryKey = 'id_content_scheduel';

    public $timestamps = false;

    public function subjectScheduel(){
        return $this->belongsTo('App\SubjectScheduel', 'id_subject_scheduel');
    }
}