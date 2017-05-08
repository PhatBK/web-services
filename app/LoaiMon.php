<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiMon extends Model
{
    protected $table = "LoaiMon";

    public function theloai(){
    	return $this->belongsTo('App\TheLoai','id_TheLoai','id');
    }
    public function monan(){
    	return $this->hasMany('App\MonAn','id_LoaiMon','id');
    }
}
