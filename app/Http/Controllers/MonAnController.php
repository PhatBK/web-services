<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Validation;
use App\Models\MonAn;
use App\Models\TheLoai;
use App\Models\LoaiMon;
use App\Models\VungMien;
use App\Models\Comment;
use App\Models\User;
use DateTime;


class MonAnController extends Controller
{
    public function getDanhSach(){

        $monan  = MonAn::orDerBy('id','DESC')->get();
    	return view('admin.monan.danhsach',['monan'=>$monan]);
    }
    public function getThem(){

        $theloai = TheLoai::all();
        $loaimon = LoaiMon::all();
        $vungmien = VungMien::all();
    	return view('admin.monan.them',[
                                            'theloai'=>$theloai,
                                            'loaimon'=>$loaimon,
                                            'vungmien'=>$vungmien
                                        ]) ;
    }
    public function postThem(Request $request){
        $this->validate($request,
                        [
                            'sltTheLoai'   =>  'required',
                            'sltLoaiMon'   =>  'required',
                            'sltVungMien'  =>  'required', 
                            'txtTieuDe'    =>  'required|min:3|unique:MonAn,TieuDe',
                            'txtTenMon'    =>  'required|min:3|unique:MonAn,TenMon',
                            'taTomTat'     =>  'required',
                            'taNoiDung'    =>  'required'

                        ],
                        [
                            'sltTheLoai.required'   =>  'bạn Chưa Trọn Thể Loại',
                            'sltLoaiMon.required'   =>  'Bạn Chưa Trọn Loại Món..',
                            'sltVungMien.required'  =>  'Bạn Chưa Chọn Vùng Miền ',
                            'txtTieuDe.required'    =>  'Bạn Chưa Nhập  Tiêu Đề..',
                            'txtTieuDe.min'         =>  'Tiêu Đề Cần có độ dài > 3 ký tự',
                            'txtTieuDe.unique'      =>  'Tiêu Đề Này Đã Tồn Tại..',
                            'txtTenMon.required'    =>  'Bạn chưa Nhập tên Món Ăn',
                            'txtTenMon.min'         =>  'Tên Món Cần Dài Hơn 3 ký tự',
                            'txtTenMon.unique'      =>  'Tên Món Đã tồn tại,nhập tên khác',
                            'taTomTat.required'     =>  'Bạn Trưa nhập Tóm tăt..',
                            'taNoiDung.required'    =>  'Bạn Chưa Nhập Nội Dung Cho Món Ăn..'

                        ]);

        $monan = new MonAn;
        $monan->id_LoaiMon = $request->sltLoaiMon;
        $monan->id_VungMien = $request->sltVungMien;
        $monan->TieuDe = $request->txtTieuDe;
        $monan->TieuDeKhongDau = changeTitle($request->txtTieuDe);
        $monan->TenMon = $request->txtTenMon;
        $monan->TomTat = $request->taTomTat;
        $monan->NoiDung = $request->taNoiDung;
        $monan->Chu_Y  = $request->taChu_Y;
        $monan->NoiBat =$request->NoiBat;
        $monan->SoLuotXem = 0;

        if($request->hasFile('Hinh')){
                $file = $request->file('Hinh');
                $duoi = $file->getClientOriginalExtension();
                if(($duoi != 'jpg') && ($duoi != 'png') && ($duoi != 'jpeg')){
                    return redirect('admin/monan/them')->with('loi',"Bạn phải nhập file ảnh..(đuôi là:jpg,png,jpeg");

                }
                $name = $file->getClientOriginalName();
                $Hinh = str_random(4)."_".$name;
                while(file_exists('uploaded/monan/'.$Hinh)){
                    $Hinh = str_random(4)."_".$name;
                }
                $file->move("uploaded/monan",$Hinh);
                $monan->Hinh = $Hinh;
        }else{
            $monan->Hinh = "";
        }
        $monan->save();

        return redirect('admin/monan/them')->with('thongbao',"Bạn Đã Thêm Món Ăn thành Công..");
    }
    public function getSua($id){
        $theloai  = TheLoai::all();
        $loaimon  = LoaiMon::all();
        $vungmien = VungMien::all();
        $monan    =  MonAn::find($id);
        $comment=$monan->comment;
    	return view('admin/monan/sua',[
                                        'theloai' =>$theloai,
                                        'loaimon' =>$loaimon, 
                                        'vungmien'=>$vungmien,
                                        'monan'   =>$monan,
                                        'comment'=>$comment
                                        ]);
    }
    public function postSua(Request $request,$id){

        $monan = MonAn::find($id);
        $this->validate($request,
                                [
                                    'sltTheLoai'  =>  'required',
                                    'sltLoaiMon'  =>  'required',
                                    'sltVungMien' =>  'required',
                                    'txtTieuDe'   =>  "required|unique:MonAn,TieuDe,$id|min:3",
                                    'txtTenMon'   =>  "required|unique:MonAn,TenMon,$id|min:3",
                                    'taTomTat'    =>  'required',
                                    'taNoiDung'   =>  'required'
                                ],
                                [
                                    'sltTheLoai.required'  => 'Bạn Chưa Trọn Thể Loại ',
                                    'sltLoaiMon.required'  => 'Bạn Chưa Chọn Loại Món ',
                                    'sltVungMien.required' => 'Bạn Chưa Chọn Vùng miền',
                                    'txtTieuDe.required'   => 'Bạn Chưa Thay Đổi Tiêu Đề',
                                    'txtTieuDe.min'        => 'Tiêu đè cần có đọ dài trong khoảng > 3 ký tự',
                                    'txtTenMon.required'   => 'Bạn Chưa Thay Đổi Tên Món Ăn',
                                    'txtTenMon.min'        => 'Tên Món Cần có độ dìa trong khoảng > 3 Ký tự',
                                    'taTomTat.required'    => 'Bạn Chưa Thay Đổi tóm Tắt',
                                    'taNoiDung.required'   => 'Bạn Chưa Thay Đổi Nội Dung'
                                ]);
        $monan->id_LoaiMon = $request->sltLoaiMon;
        $monan->id_VungMien = $request->sltVungMien;
        $monan->TieuDe = $request->txtTieuDe;
        $monan->TieuDeKhongDau = changeTitle($request->txtTieuDe);
        $monan->TenMon = $request->txtTenMon;
        $monan->TomTat = $request->taTomTat;
        $monan->NoiDung = $request->taNoiDung;
        $monan->Chu_Y  = $request->taChu_Y;
        $monan->NoiBat =$request->NoiBat;
        $monan->SoLuotXem = 0;  

        if($request->hasFile('Hinh')){
                $file = $request->file('Hinh');
                $duoi = $file->getClientOriginalExtension();
                if(($duoi != 'jpg') && ($duoi != 'png') && ($duoi != 'jpeg')){
                    return redirect('admin/monan/sua/'.$id)->with('loi',"Bạn phải nhập file ảnh..(đuôi là:jpg,png,jpeg");
                }
                $name = $file->getClientOriginalName();
                $Hinh = str_random(4)."_".$name;
                while(file_exists('uploaded/monan/'.$Hinh)){
                    $Hinh = str_random(4)."_".$name;
                }
                $file->move("uploaded/monan",$Hinh);
                unlink('uploaded/monan/'.$monan->Hinh);
                $monan->Hinh = $Hinh;
        }
        $monan->save();

        return redirect('admin/monan/sua/'.$id)->with('thongbao','Bạn Đã Sửa Thành Công món ăn.');
    }
    public function getXoa($id){
        $monan = MonAn::find($id);
        $monan->delete();
        return redirect('admin/monan/danhsach')->with('thongbao','Xoá Thành Công...');
    }
}
