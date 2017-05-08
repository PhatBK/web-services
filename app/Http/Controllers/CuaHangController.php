<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation;

use App\Http\Requests;
use App\CuaHang;

class CuaHangController extends Controller
{
    public function getDanhSach(){
    	$cuahang_ds = CuaHang::all();
    	return view('admin.cuahang.danhsach',['cuahang_ds'=>$cuahang_ds]);
    }
    public function getThem(){
    	return view('admin.cuahang.them');
    }
    public function postThem(Request $request){
        $this->validate($request,
                        [
                            'ten' => 'required|unique:CuaHang,ten|min:3|max:100',
                            'link' => 'required',
                            'vi_chi' => 'required'
                        ],
                        [
                            'ten.required' => 'Chưa Nhập Tên Cửa Hàng..',
                            'ten.unique'   => 'Cửa Hàng Này Đã tồn tại..',
                            'ten.min'      => 'Tên phải nằm trong khoảng 3-->100 ký tự',
                            'ten.max'      => 'Tên phải nằm trong khoảng 3-->100 ký tự ',
                            'link.required' => 'Chưa nhập Link liên kết tới cửa hàng',
                            'vi_chi.required' => 'Chưa nhập vị chí cửa hàng'
                        ]);
        $cuahang = new CuaHang;
        $cuahang->ten = $request->ten;
        $cuahang->ten_khong_dau = changeTitle($request->ten);
        $cuahang->gioi_thieu = $request->gioi_thieu;
        $cuahang->link = $request->link;
        $cuahang->vi_chi = $request->vi_chi;

        $cuahang->save();
        return redirect('admin/cuahang/them')->with('thongbao','Thêm Cửa Hàng Thành Công...');

    }
    public  function getSua($id){
        $cuahang = CuaHang::find($id);
        return view('admin.cuahang.sua',['cuahang'=>$cuahang]);
    }
    public function postSua(Request $request,$id){
        $cuahang = CuaHang::find($id);
         $this->validate($request,
                        [
                            
                        ],
                        [
                            
                        ]);

        $cuahang->ten = $request->ten;
        $cuahang->ten_khong_dau = changeTitle($request->ten);
        $cuahang->gioi_thieu = $request->gioi_thieu;
        $cuahang->link = $request->link;
        $cuahang->vi_chi = $request->vi_chi;

        $cuahang->save();
        return redirect('admin/cuahang/sua/'.$id)->with('thongbao','Sửa Thông Tin Cửa Hàng Thành Công...');

    }
    public function getXoa($id){
        $cuahang = CuaHang::find($id);
        $cuahang->delete();
        return redirect('admin/cuahang/danhsach')->with('thongbao','Đã Xóa Cửa Hàng Thành Công..');
    }
}
