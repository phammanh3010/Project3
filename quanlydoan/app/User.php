<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table = 'user';

    protected $fillable = ['username', 'fullname', 'position', 'email', 'phone'];

    protected $primaryKey = 'username';

    public $incrementing = false;

    public $timestamps = false;

    public function teacher(){
        return $this->belongsTo('App\Teacher', 'username', 'username');
    }

    public function student(){
        return $this->belongsTo('App\Student', 'username', 'username');
    }
}
