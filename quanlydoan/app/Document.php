<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $table = 'document';

    protected $fillable = ['id_document', 'id_group', 'path', 'evaluate', 'user_upload', 'created_at'];

    protected $primaryKey = 'id_document';

    public function group(){
        return $this->belongsTo('App\Group', 'id_group');
    }
}
