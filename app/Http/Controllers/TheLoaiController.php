<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\TheLoai;
use Illuminate\Validation;

class TheLoaiController extends Controller
{
    public function getDanhSach(){

    	$theloai = TheLoai::all();
    	return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
    public function getThem(){

    	return view('admin.theloai.them');
    }
    public function postThem(Request $request){
        $this->validate($request,
            [
                'txtTen' => 'required|min:3|max:100|unique:TheLoai,ten'
            ],
            [
                'txtTen.required' =>   ' Bạn Chưa Nhập Tên Thể Loại',
                'txtTen.unique'   =>   ' Tên Thể Loại Này Đã Tồn Tại',
                'txtTen.min'      =>   ' Tên Thể Loại Cần Có Độ Dài Trong Khoảng Từ 3 --> 100 Ký Tự',
                'txtTen.max'      =>   ' Tên Thể Loại Cần Có Độ Dài Trong Khoảng Từ 3 --> 100 Ký Tự'    
            ]
            );
        $theloai = new TheLoai;
        $theloai->ten = $request->txtTen;
        $theloai->ten_khong_dau = changeTitle($request->txtTen);
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','Đã Thêm Thành Công !!!');
    }
    public function getSua($id){
        $theloai = TheLoai::find($id);
    	return view('admin/theloai/sua',['theloai'=>$theloai]);
    }
    public function postSua(Request $request,$id){
        $theloai = TheLoai::find($id);
        $this->validate($request,
                        [
                            'txtTen' => 'required|unique:TheLoai,ten|min:3|max:100'
                        ],
                        [
                            'txtTen.unique'      => 'Bạn Chưa Sửa Tên Thể Loại,Hãy Sửa Nó...',
                            'txtTen.min'         => 'Tên Thể Loại Phải Nằm Trong Khoảng Từ 3 -->100 ký tự',
                            'txtTen.max'         => 'Tên Thể Loại Phải Nằm Trong Khoảng Từ 3 -->100 ký tự'
                        ]);
        $theloai->ten = $request->txtTen;
        $theloai->ten_khong_dau = changeTitle($request->txtTen);
        $theloai->save();
        return redirect('admin/theloai/sua/'.$id)->with('thongbao','Đã Sửa Thành Công !!!');
    }
    public function getXoa($id){
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao','Bạn Đã Xóa Thành Công !!');
    }
}
