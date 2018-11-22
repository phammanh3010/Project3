<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentGroupScheduel extends Model
{
    //
    protected $table = 'content_subject_scheduel';

    protected $fillable = ['id_content_subject', 'id_subject_scheduel', 'time_deadline', 'require', 'penalty'];

    protected $primaryKey = 'id_content_subject';

    public $timestamps = false;

    public function groupScheduel(){
        return $this->belongsTo('App\SubjectScheduel', 'id_subject_scheduel');
    }
}