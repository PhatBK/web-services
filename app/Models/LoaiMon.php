<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiMon extends Model
{
    protected $table = "LoaiMon";

    public function theloai(){
    	return $this->belongsTo('App\Models\TheLoai','id_TheLoai','id');
    }
    public function monan(){
    	return $this->hasMany('App\Models\MonAn','id_LoaiMon','id');
    }
}
