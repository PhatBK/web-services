<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\TheLoai;
use App\Models\LoaiMon;
use DateTime;


class LoaiMonController extends Controller
{
     public function getDanhSach(){

        $loaimon = LoaiMon::all();
        return view('admin.loaimon.danhsach',['loaimon'=>$loaimon]);
    }

    public function getThem(){
        $theloai = TheLoai::all();
        return view('admin.loaimon.them',['theloai'=>$theloai]);

    }
    /*public function postThem(ThemLoaiMonRequest $request){

    }*/
    public function postThem(Request $request){

        $theloai = TheLoai::all();

        $this->validate($request,
            [
                'sltTheLoai' => 'required',
                'txtTen' => 'required|min:3|max:100|unique:LoaiMon,ten'
            ],
            [
                'sltTheLoai.required'    =>   '- Bạn Chưa Chọn Thể Loại Cho Loại Món Định Thêm ',
                'txtTen.required'        =>   '- Bạn Chưa Nhập Tên Loại Món',
                'txtTen.unique'          =>   '- Loại Món Này Đã Tồn Tại',
                'txtTen.min'             =>   '- Tên Thể Loại Cần Có Độ Dài Trong Khoảng Từ 3 --> 100 Ký Tự',
                'txtTen.max'             =>   '- Tên Thể Loại Cần Có Độ Dài Trong Khoảng Từ 3 --> 100 Ký Tự'    
            ]
            );
        $loaimon = new LoaiMon;
        $loaimon->id_TheLoai = $request->sltTheLoai;
        $loaimon->ten = $request->txtTen;
        $loaimon->ten_khong_dau = changeTitle($request->txtTen);
        $loaimon->save();

        return redirect('admin/loaimon/them')->with('thongbao','Đã Thêm Loại Món Mới Thành Công !!!');
    }

    public function getSua($id){
        $theloai = TheLoai::all();
        $loaimon = LoaiMon::find($id);
        return view('admin/loaimon/sua',['loaimon'=>$loaimon,'theloai'=>$theloai]);
    }

    public function postSua(Request $request,$id){

        $theloai = TheLoai::all();
        $this->validate($request,
                        [
                            
                            'txtTen' => 'required|unique:LoaiMon,ten|min:3|max:100',
                            'sltTheLoai' =>'required'
                        ],
                        [
                            'txtTen.required'     => '- Bạn Chưa Thay Đổi Tên Thể Loại ',
                            'txtTen.unique'       => '- Bạn Chưa Sửa Tên Loại Món Này...',
                            'txtTen.min'          => '- Tên Thể Loại Phải Nằm Trong Khoảng Từ 3 -->100 ký tự',
                            'txtTen.max'          => '- Tên Thể Loại Phải Nằm Trong Khoảng Từ 3 -->100 ký tự',
                            'sltTheLoai.required' => '- Bạn Chưa Chọn Thể Loại Mới'
                        ]);
        
        $loaimon = LoaiMon::find($id);
        $loaimon->ten = $request->txtTen;
        $loaimon->id_TheLoai = $request->sltTheLoai;
        $loaimon->ten_khong_dau = changeTitle($request->txtTen);
        $loaimon->save();

        return redirect('admin/loaimon/sua/'.$id)->with('thongbao','Đã Sửa Loại Món Thành Công !!!');
        
    }
    public function getXoa($id){
        $loaimon = LoaiMon::find($id);
        $loaimon->delete();
        return redirect('admin/loaimon/danhsach')->with('thongbao','Bạn Đã Xóa Loại Món Thành Công !!');
    }
}
