<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LoaiMon;
use App\Comment;
use App\VungMien;

class MonAn extends Model
{
    protected $table = "MonAn";

    public function loaimon(){
    	return $this->belongsTo('AppLoaiMon','id_LoaiMon','id');
    }
    public function comment(){
    	return $this->hasMany('App\Comment','id_MonAn','id');
    }
    public function vungmien(){
    	return $this->belongsTo('App\VungMien','id_VungMien','id');
    }
}
