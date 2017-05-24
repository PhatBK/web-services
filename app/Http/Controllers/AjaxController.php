<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\TheLoai;
use App\Models\LoaiMon;
use App\Models\MonAn;
use App\Models\Comments;

class AjaxController extends Controller
{
    public function getLoaiMon($idTheLoai){
    	
    	$loaimon = LoaiMon::where('id_TheLoai',$idTheLoai)->get();

    	foreach ($loaimon as $lm) {
    		echo "<option value='" .$lm->id. "'>" .$lm->ten."</option>";
    	}

	}

	public function search($tukhoa){
		$monan=MonAn::where('TieuDe','like',"%$tukhoa%")->get();
       	  foreach ($monan as $ma) {
       	  	# code...
       	  
       	  echo "<div class=row-item row>
                        <div class=col-md-3>

                            <a href=monan/".$ma->id."/".$ma->TieuDeKhongDau.".html>
                                <br>
                                <img width=200px height=200px class=img-responsive src=upload/monan/".$ma->Hinh." alt=>
                            </a>
                        </div>

                        <div class=col-md-9>
                            <h3>".$ma->TieuDe."</h3>
                            <p>".$ma->TomTat."</p>
                            <a class=btn btn-primary href=monan/".$ma->id."/".$ma->TenMon.".html>Chi tiết<span class=glyphicon glyphicon-chevron-right></span></a>
                        </div>
                        <div class=break></div>
                    </div>";
                  }


	
}
