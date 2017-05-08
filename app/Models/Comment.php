<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "Comment";

    public function monan(){
    	return $this->belongsTo('App\Models\MonAn','id_MonAn','id');
    }
    public function user(){
    	return $this->belongsTo('App\Models\User','id_User','id');
    }
}
