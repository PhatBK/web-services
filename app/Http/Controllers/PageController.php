<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation;

use App\Models\TheLoai;
use App\Models\Slide;
use App\Models\LoaiMon;
use App\Models\Monan;
use App\Models\Comment;
use App\Models\User;
use App\Models\VungMien;
use App\Models\CuaHang;

class PageController extends Controller
{
    //
    function __construct(){

    	$slide          =  Slide::all();
    	$theloai        =  TheLoai::all();
    	$vungmien       =  VungMien::all();
        $thanhvienuutu  =  User::orderBy('master','desc')->take(5)->get();
        $cuahangAll     =  CuaHang::all();
        view()->share('thanhvienuutu',$thanhvienuutu);
		view()->share('vungmien',$vungmien);
    	view()->share('theloai',$theloai);
    	view()->share('slide',$slide);
        view()->share('cuahangAll',$cuahangAll);
    }
    function trangchu(){
    	
    	return view('pages.trangchu');
    }
    function lienhe(){
    	return view('pages.lienhe');
    }
    function loaimon($id){
        $loaimon = LoaiMon::find($id);
        $monan=MonAn::where('id_LoaiMon',$id)->paginate(5);
        return view('pages.loaimon',['loaimon'=>$loaimon,'monan'=>$monan]);
    }
    function monan($id){

        $monan=MonAn::find($id);
        $view=$monan->SoLuotXem + 1;
        $monan->SoLuotXem=$view;
        $monan->save();

        $monlienquan=MonAn::where('id_LoaiMon',$monan->id_LoaiMon)->orderBy('id','desc')->take(4)->get();
        $monnoibat=MonAn::where('NoiBat',1)->take(4)->get();
        
        $comment=Comment::where('id_MonAn',$id)->orderBy('created_at','desc')->get();
        
        return view('pages.monan',['monan'=>$monan,
                                   'comment'=>$comment,
                                   'monlienquan'=>$monlienquan,
                                   'monnoibat'=>$monnoibat]);
    }
    function getDangNhap(){
        return view('pages.dangnhap');
    }
    function postDangNhap(Request $request){
       $this->validate($request,
                                [
                                    'username'     => 'required',
                                    'password'     =>'required|min:5|max:32'

                                ],
                                [
                                    'username.required'    => 'Bạn Chưa Nhập Username',
                                    'password.required'    => 'Bạn Chưa Nhập Password',
                                    'password.min'         => 'Password > 5 ký tự',
                                    'password.max'         => 'Password <32 Ký tự'

                                ]);

        if(Auth::attempt(['username'=>$request->username,
                          'password'=>$request->password])){
                return redirect('trangchu');
        }else{
            return redirect('dangnhap')->with('thongbao','Đăng nhâp không thành công');
        }
    }
    function getDangXuat(){
        Auth::logout();
        return redirect('trangchu');
    }
    function getDangKy(){
        return view('pages.dangky');
    }
    function postDangKy(Request $request){
        $this->validate($request,[
            'username'=>'required|min:3:max:30|unique:users,username',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:4|max:32',
            'passwordAgain'=>'required|min:4:max:32|same:password',
            'avatar'=>'required|image',
           
            ],
            [
            'username.required'=>'Bạn chưa nhập username',
            'username.unique'=>'Username đã tồn tại',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Email không hợp lệ',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu từ 4-32 kí tự',
            'password.max'=>'Mật khẩu từ 4-32 kí tự',
            
            'passwordAgain.required'=>'Bạn chưa nhập lại password',
            'passwordAgain.same'=>'Mật khẩu không khớp',
            'avatar.required'=>'Bạn chưa chọn ảnh đại diện',
            'avatar.image'=>'Ảnh đại diện không hợp lệ',


            ]);
        $user=new User();
        $user->username=$request->username;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->level=3;
		$user->master=0;
		$user->profile=$request->profile;
        /*
            Lưu ảnh đại diện
        */
        $file=$request->file('avatar');
        $filename=$file->getClientOriginalName();
        $Hinh=str_random(4).$filename;
        while (file_exists('avatar/'.$Hinh)) {
            # code...
             $Hinh=str_random(4).$filename;

        }
        $user->avatar="avatar/".$Hinh;
        $file->move('avatar',$Hinh);
        $user->save();
        return redirect('dangky')->with('thongbao','Đăng ký thành công');
    }
    function postBinhLuan($id,Request $request){
        $this->validate($request,array(
            'NoiDung'=>'required|max:255',
            ));
        $monan = Monan::find($id);
        $comment=new Comment();
        $comment->NoiDung=$request->NoiDung;
        $comment->DanhGia=0;
        $comment->id_User=Auth::user()->id;
        $comment->id_MonAn=$id;
        $comment->save();
        $user=Auth::user();
        $master=$user->master +1;
        $user->master=$master;
        $user->save();

        return redirect('monan/'.$id.'/'.$monan->TieuDeKhongDau.'.html')->with('thongbao','Bình luận thành công');
    }
    function getNguoiDung(){
        return view('pages.nguoidung');
    }
    function postNguoiDung(Request $request){
    	$id_user=Auth::user()->id;
        $this->validate($request,array(
            'username'=>"required|min:3|max:32|unique:users,username,$id_user",
            'profile'=>'required|min:3|max:255',

            ));
        $user=User::find(Auth::user()->id);
        $user->username=$request->username;
        $user->profile=$request->profile;
        if($request->changePassword == "on"){
            $this->validate($request,array(
                'password'=>'required|min:4|max:32',
                'passwordAgain'=>'required|min:4|max:32|same:password',
                ));
            $user->password=bcrypt($request->password);
        }
        if($request->hasFile('avatar')){
            $this->validate($request,[
                'avatar'=>'image'
                ],
                [
                'avatar.image'=>'Ảnh đại diện không hợp lệ',
                ]);
            $file=$request->file('avatar');
            $filename=$file->getClientOriginalName();
            $Hinh=str_random(4).$filename;
            while(file_exists('avatar/'.$Hinh)){
                $Hinh=str_random(4).$filename;

            }
            if($user->avatar !=null){
               unlink($user->avatar); 
            }
            
            $user->avatar='avatar/'.$Hinh;
            $file->move('avatar',$Hinh);


        }
        $user->save();
        return redirect('nguoidung')->with('thongbao','Sửa thông tin thành công');
    }
    function getTimKiem(){
        return view('pages.timkiem');
    }
    function postTimKiem(Request $request){
       
        $tukhoa=$request->tukhoa;
        $monan=MonAn::where('TieuDe','like',"%$tukhoa%")->get();
        return view('pages.timkiem',['tukhoa'=>$tukhoa,'monanTim'=>$monan]);
    }
   function getGioiThieu(){
    return view('pages.gioithieu');
   }
   function getVungMien($id){
   		$vungmien=VungMien::find($id);
   		$monan=MonAn::where('id_VungMien',$id)->paginate(5);
   		return view('pages.vungmien',['monan'=>$monan,'vungmienMon'=>$vungmien]);
   }
   public function cuahang($id){

        $cuahang = CuaHang::find($id);
        return view('pages.cuahang',['cuahang'=>$cuahang]);
    }
}
