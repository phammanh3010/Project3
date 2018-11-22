<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentGroupScheduel extends Model
{
    //
    protected $table = 'content_group_scheduels';

    protected $fillable = ['id_content', 'id_scheduel', 'time_deadline', 'require', 'penalty'];

    protected $primaryKey = 'id_content';

    public $timestamps = false;

    public function groupScheduel(){
        return $this->belongsTo('App\GroupScheduel', 'id_subject');
    }
}
