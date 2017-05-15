<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\TheLoai;
use App\Models\LoaiMon;
use App\Models\MonAn;

class AjaxController extends Controller
{
    public function getLoaiMon($idTheLoai){

    	$loaimon = LoaiMon::where('id_TheLoai',$idTheLoai)->get();

    	foreach ($loaimon as $lm) {
    		echo "<option value='" .$lm->id. "'>" .$lm->ten."</option>";
    	}

	}
	
}
