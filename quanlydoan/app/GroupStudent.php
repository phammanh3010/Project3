<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupStudent extends Model
{
    //
    protected $table = 'group_student'; 

    protected $fillable = ['id_student', 'ig_group'];

    protected $primaryKey = 'id_group_student';

    public $timestamps = false;
}
