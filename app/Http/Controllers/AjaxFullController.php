<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation;
use App\Models\TheLoai;
use App\Models\LoaiMon;
use App\Models\MonAn;
use App\Models\User;
use App\Models\Comment;
use App\Models\CuaHang;
use App\Models\VungMien;
use DateTime;


class AjaxFullController extends Controller
{
    public function getTimKiemMonAn(){

    }
    public function postTimKiemMonAn(Request $request){

    }
    public function getComment(){

    }
    public function postComment(Request $request){

    }
    public function getLoaiMon($idLoaiMon){
        $loaimon = LoaiMon::find($idLoaiMon);
        $monan = MonAn::where('id_LoaiMon',$idLoaiMon);
        foreach($monan as $ma){
            echo "<p>".$ma->TenMon."</p>";
            echo "<br />";
        }

    }

    public function postLoaiMon(Request $request){
    	
    }
}
