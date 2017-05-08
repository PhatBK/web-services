<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Models\Comment;
use App\Models\MonAn;

class CommentController extends Controller
{
    public function getXoa($id,$idMonAn){
    	$comment = Comment::find($id);
    	$comment->delete();

    	return redirect('admin/monan/sua/'.$idMonAn)->with('thongbao','Bạn đã sóa comment thành công ...');
    }
    public function postComment(Request $request,$id){
    	$idMonAn = $id;
    	$monan = MonAn::find($id);
    	$comment = new Comment;
    	$comment->id_MonAn = $idMonAn;
    	$comment->id_User = Auth::user()->id;
    	$comment->NoiDung = $request->NoiDung;
    	$comment->DanhGia = 0;

   		 $comment->save();

   		 //return redirect('monan/'.$id.'/'.$monan->TieuDeKhongDau.'.html')->with('thongbao','Bình Luận Thành Công...');
   		 return redirect("monan/$id/$monan->TieuDeKhongDau.html");
    }
}
