<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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
