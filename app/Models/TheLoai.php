<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table = "TheLoai";

    public function loaimon(){
		return $this->hasMany('App\Models\LoaiMon','id_TheLoai','id');
    }
    public function monan(){
    	return $this->hasManyThrough('App\Models\MonAn','App\Models\LoaiMon','id_TheLoai','id_LoaiMon','id');
    }
}
