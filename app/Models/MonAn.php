<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\LoaiMon;
use App\Models\Comment;
use App\Models\VungMien;

class MonAn extends Model
{
    protected $table = "MonAn";

    public function loaimon(){
    	return $this->belongsTo('App\Models\LoaiMon','id_LoaiMon','id');
    }
    public function comment(){
    	return $this->hasMany('App\Models\Comment','id_MonAn','id');
    }
    public function vungmien(){
    	return $this->belongsTo('App\Models\VungMien','id_VungMien','id');
    }
}
