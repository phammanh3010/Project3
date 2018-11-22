<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupScheduel extends Model
{
    //
    protected $table = 'group_scheduel';

    protected $fillable = ['id_scheduel', 'id_group'];

    protected $primaryKey = 'id_scheduel';

    public $timestamps = false;

    public function group(){
        return $this->belongsTo('App\Group', 'id_group');
    }

    public function content(){
        return $this->hasMany('App\ContentGroupScheduel', 'id_scheduel', 'id_scheduel');
    }
}
