<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvalutionCriteria extends Model
{
    //
    protected $table = 'evalution_criteria';

    protected $fillable = ['id_evalution_criteria', 'id_group', 'content', 'bonus'];

    protected $primaryKey = 'id_evalution_criteria';

    public $timestamps = false;

    public function group(){
        return $this->belongsTo('App\Group', 'id_group');
    }
}
