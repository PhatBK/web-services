<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation;
use App\Models\User;
use App\Models\Comment;

class UserController extends Controller
{
	public function getDanhSach(){
		$user = User::all();
		return view('admin.user.danhsach',['user'=>$user]);
	}
	public function getThem(){

		return view('admin.user.them');
	}
	public function postThem(Request $request){
		$this->validate($request,
								[
									'username'  =>    'required|unique:users,username|min:5',
									'email'      =>    'required|email|unique:users,email', 
									'password'      =>    'required|min:5|max:32',
									'passwordAgain'    =>    'required|same:password',
									'avatar'=>'required|image',
								],
								[
									'username.required'  =>  'Chưa Nhập Tên Người Dùng',
									'username.min'       =>  'Tên Người Dùng phải từ 5 ký tự trở lên',
									'username.unique'    =>  'Người Dùng Này Đã tồn tại',

									'email.required'      =>  'Chưa Nhập Email người dùng',
									'email.email'         =>  'Địa Chỉ Mail này không đúng',
									'email.unique'        =>  'Địa chỉ Mail này đã tồn tại',
									'password.required'      =>  'Chưa Nhập mật khẩu',
									'password.min'           =>  'Mật Khẩu phải > 5 ký tự',
									'password.max'           =>  'Mật khẩu phải <32 lý tự',

									'passwordAgain.required'    =>  'Chưa xác nhận mật khẩu',
									'passwordAgain.same'        =>  'Mật Khẩu Xác Nhận không đúng',
									'avatar.required'=> 'Bạn chưa chọn ảnh đại diện',
									'avatar.image'=>'Ảnh đại diện không hợp lệ',
								]);
		$user = new User;
		$user->username = $request->username;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->master = $request->master;
		$user->profile = $request->profile;
		$user->level = $request->level;
		$file=$request->file('avatar');
		$filename=$file->getClientOriginalName();
		$Hinh=str_random(4).$filename;
		while(file_exists('avatar/'.$Hinh)){
			$Hinh=str_random(4).$filename;
		}
		$file->move('avatar',$Hinh);
		$user->avatar='avatar/'.$Hinh;
		$user->save();
		return redirect('admin/user/them')->with('thongbao','Thêm User thành công..');
	}
	public function getSua($id){
		$userLogin = Auth::user();
		$user = User::find($id);

		if($userLogin != $user){
			return redirect('admin/user/danhsach')->with('thongbaoloi','Bạn không thể sửa tài khoản khác..');
		}else{
			return view('admin.user.sua',['user'=>$user]);
		}
	}
	public function postSua(Request $request,$id){
		$this->validate($request,
								[
									'username'  =>    "required|unique:users,username,$id|min:5"
								],
								[
									'username.required'  =>  'Chưa Nhập Tên Người Dùng',
									'username.min'       =>  'Tên Người Dùng phải từ 5 ký tự trở lên',
									'username.unique'    =>  'Người Dùng Này Đã tồn tại'
								]);
		$user = User::find($id);
		$user->username = $request->username;
		$user->email = $request->email;
		$user->master = $request->master;
		$user->profile = $request->profile;
		$user->level = $request->level;
		if($request->changePass == "on"){
			$this->validate($request,
								[
									'password'      =>    'required|min:5|max:32',
									'passwordAgain'    =>    'required|same:password'
								],
								[

									'password.required'      =>  'Chưa Nhập mật khẩu',
									'password.min'           =>  'Mật Khẩu phải > 5 ký tự',
									'password.max'           =>  'Mật khẩu phải <32 lý tự',
									'passwordAgain.required'    =>  'Chưa xác nhận mật khẩu',
									'passwordAgain.same'        =>  'Mật Khẩu Xác Nhậ không đúng'
								]);
			$user->password = bcrypt($request->password);
		}
		if($request->hasFile('avatar')){
			$this->validate($request,[
				'avatar'=>'image',

				],[
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
			$file->move('avatar',$Hinh);
			$user->avatar='avatar/'.$Hinh;
		}
		$user->save();
		return redirect('admin/user/sua/'.$id)->with('thongbao','Đã Sửa User thành Công..');
	}
	public function getDangNhapAdmin(){
		return view('admin.login');
	}
	public function postDangNhapAdmin(Request $request){
		$this->validate($request,
								[
									'username' => 'required',
									'password'=>'required|min:5|max:32'

								],
								[
									'username.required'    => 'Bạn Chưa Nhập Username',
									'password.required' => 'Bạn Chưa Nhập Password',
									'password.min'      => 'Password > 5 ký tự',
									'password.max'      => 'Password <32 Ký tự'
								]);
		if(Auth::attempt([	'username'=> $request->username,
							'password'=>$request->password])){
			return redirect('admin/theloai/danhsach');
		}else{
			return redirect('admin/dangnhap')->with('thongbao','Đăng nhập thất bại ..');
		}
	}
	public function getDangXuatAdmin(){
		Auth::logout();
		return redirect('admin/dangnhap');
	}
    public function getXoa($id){
		$user = User::find($id);
		$userLogin = Auth::user();
		if($userLogin->level == 0){
			if($userLogin  == $user){
				return redirect('admin/user/danhsach')->with('thongbaoloi','Không thể xóa Super-Admin, Admin khác hoặc chính tài khoản đang đăng nhập...');
			}
			else{
				$user->delete();
		    	return redirect('admin/user/danhsach')->with('thongbao','Xóa user thành công...');
			}
		}
		if(($userLogin->level == 1 && $user->level == 0) || ($user == $userLogin) || ($user->level == 1)){
			return redirect('admin/user/danhsach')->with('thongbaoloi','Không thể xóa Super-Admin, Admin khác hoặc chính tài khoản đang đăng nhập...');
		}
		if(($userLogin->level == 1) && ($user->level == 3)){
			$user->delete();
		    return redirect('admin/user/danhsach')->with('thongbao','Xóa user thành công...');
		}
	}
}
