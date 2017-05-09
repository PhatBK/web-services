<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "Comment";

    public function monan(){
    	return $this->belongsTo('App\MonAn','id_MonAn','id');
    }
    public function user(){
    	return $this->belongsTo('App\User','id_User','id');
    }
}
