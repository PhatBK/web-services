<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation;
use App\Http\Requests;
use App\Models\Slide;

class SlideController extends Controller
{
    public function getDanhSach(){
    	$slide = Slide::all();
    	return view('admin/slide/danhsach',['slide'=>$slide]);
    }
    public function getThem(){
    	return view('admin.slide.them');
    }
    public function postThem(Request $request){
    	$this->validate($request,
    							[
    								'ten' => 'required',
    								'NoiDung' =>'required'
    							],
    							[
    								'ten.required'  => 'Bạn Chưa nhập tên slide..',
    								'NoiDung.required'        => 'Bạn Chưa Ghi Nội dung của slide...'
    							]);
    	$slide = new Slide;
    	$slide->Ten = $request->ten;
    	$slide->NoiDung = $request->NoiDung;
    	if($request->has('link')){
    		$slide->link = $request->link;
    	}
    	if($request->hasFile('Hinh')){
                $file = $request->file('Hinh');
                $duoi = $file->getClientOriginalExtension();
                if(($duoi != 'jpg') && ($duoi != 'png') && ($duoi != 'jpeg')){
                    return redirect('admin/slide/them')->with('loi',"Bạn phải nhập file ảnh..(đuôi là:jpg,png,jpeg");

                }
                $name = $file->getClientOriginalName();
                $Hinh = str_random(4)."_".$name;
                while(file_exists('upload/slide/'.$Hinh)){
                    $Hinh = str_random(4)."_".$name;
                }
                $file->move("upload/slide",$Hinh);
                $slide->Hinh = $Hinh;
        }else{
            $slide->Hinh = "";
        }
        $slide->save();
        return redirect('admin/slide/them')->with('thongbao','Bạn đã thêm slide thành công..');

    }
    public function getSua($id){
    	$slide = Slide::find($id);
    	return view('admin/slide/sua',['slide'=>$slide]);

    }
    public function postSua(Request $request,$id){
    	$this->validate($request,
    							[
    								'ten' => 'required',
    								'NoiDung' =>'required'
    							],
    							[
    								'ten.required'  => 'Bạn Chưa nhập tên slide..',
    								'NoiDung'        => 'Bạn Chưa Ghi Nội dung của slide...'
    							]);
    	
    	$slide = Slide::find($id);
    	$slide->Ten = $request->ten;
    	$slide->NoiDung = $request->NoiDung;
    	if($request->has('link')){
    		$slide->link = $request->link;
    	}
    	if($request->hasFile('Hinh')){
                $file = $request->file('Hinh');
                $duoi = $file->getClientOriginalExtension();
                if(($duoi != 'jpg') && ($duoi != 'png') && ($duoi != 'jpeg')){
                    return redirect('admin/slide/sua/'.$id)->with('loi',"Bạn phải nhập file ảnh..(đuôi là:jpg,png,jpeg");
                }
                $name = $file->getClientOriginalName();
                $Hinh = str_random(4)."_".$name;
                while(file_exists('upload/slide/'.$Hinh)){
                    $Hinh = str_random(4)."_".$name;
                }
                unlink('upload/slide/'.$slide->Hinh);
                $file->move("upload/slide",$Hinh);
                $slide->Hinh = $Hinh;
        }
        $slide->save();
        return redirect('admin/slide/sua/'.$id)->with('thongbao','Đã Sửa Thành Công....');
    }
    public function getXoa($id){
    	$slide = Slide::find($id);
    	$slide->delete();
    	return redirect('admin/slide/danhsach')->with('thongbao','Bạn Đã Xóa Slide Thành Công..');
    }
}
