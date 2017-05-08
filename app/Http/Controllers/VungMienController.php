<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation;
use App\Http\Requests;
use App\Models\TheLoai;
use App\Models\LoaiMon;
use App\Models\MonAn;
use App\Models\VungMien;
class VungMienController extends Controller
{
public function getDanhSach(){
$vungmien = VungMien::all();
return view('admin.vungmien.danhsach',['vungmien'=>$vungmien]);
}

//Thêm Thông tin
public function getThem(){
    return view('admin.vungmien.them');
}
public function postThem(Request $request){
    $this->validate($request,
                    [
                        'txtTen' => 'required|min:3|max:100|unique:VungMien,ten'
                    ],[
                        'txtTen.required'  => 'Bạn Trưa Nhập Vùng Miền',
                            'txtTen.unique'     =>  'Tên Vùng Miền Này Đã Tồn Tại,Nhập Tên Khác',
'txtTen.min'        => 'Tên Vùng Miền Nằm Trong Khoảng từ 3-->100 ký tự',
'txtTen.max'        => 'Tên Vùng Miền Nằm Trong Khoảng từ 3-->100 ký tự'
]);
$vungmien = new VungMien;
$vungmien->ten = $request->txtTen;
$vungmien->ten_khong_dau = changeTitle($request->txtTen);
$vungmien->info = $request->txtInfo;
$vungmien->save();
return redirect('admin/vungmien/them')->with('thongbao','Đã Thêm Vùng Miền Thành Công !!!');
}

//Sửa Thôngtin
public function getSua($id){
$vungmien = VungMien::find($id);
return view('admin.vungmien.sua',['vungmien'=>$vungmien]);
}
public function postSua(Request $request,$id){
$vungmien = VungMien::find($id);
$this->validate($request,
[
'txtTen'  => 'required|unique:VungMien,ten|min:3|max:100',
'txtInfo' =>'required'
],[
'txtTen.required'     => 'Bạn Chưa Thay Đổi Tên Vùng Miền...',
'txtTen.unique'       => 'Tên Vùng Miền Này Đã Tồn Tại...',
'txtTen.min'          =>'Tên Vùng Miền Nằm Trong Khoảng 3-->100 Ký Tự',
'txtTen.max'          =>'Tên Vùng Miền Nằm Trong Khoảng 3-->100 Ký Tự'
]);
$vungmien->ten = $request->txtTen;
$vungmien->ten_khong_dau = changeTitle($request->txtTen);
$vungmien->info = $request->txtInfo;
$vungmien->save();
return redirect('admin/vungmien/sua/'.$id)->with('thongbao','Bạn Đã Sửa Thành
   Công...');
}
public function getXoa($id){
$vungmien = VungMien::find($id);
$vungmien->delete();
return redirect('admin/vungmien/danhsach')->with('thongbao','Bạn Đã Xóa Thành Công !!');
}
}