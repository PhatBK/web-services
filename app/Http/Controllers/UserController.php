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
									'txtUsername'  =>    'required|unique:users,username|min:5',
									'txtMail'      =>    'required|email|unique:users,email', 
									'txtPass'      =>    'required|min:5|max:32',
									'txtPassXN'    =>    'required|same:txtPass'
								],
								[
									'txtUsername.required'  =>  'Chưa Nhập Tên Người Dùng',
									'txtUsername.min'       =>  'Tên Người Dùng phải từ 5 ký tự trở lên',
									'txtUsername.unique'    =>  'Người Dùng Này Đã tồn tại',

									'txtMail.required'      =>  'Chưa Nhập Email người dùng',
									'txtMail.email'         =>  'Địa Chỉ Mail này không đúng',
									'txtMail.unique'        =>  'Địa chỉ Mail này đã tồn tại',
									'txtPass.required'      =>  'Chưa Nhập mật khẩu',
									'txtPass.min'           =>  'Mật Khẩu phải > 5 ký tự',
									'txtPass.max'           =>  'Mật khẩu phải <32 lý tự',

									'txtPassXN.required'    =>  'Chưa xác nhận mật khẩu',
									'txtPassXN.same'        =>  'Mật Khẩu Xác Nhậ không đúng'
								]);
		$user = new User;
		$user->username = $request->txtUsername;
		$user->email = $request->txtMail;
		$user->password = bcrypt($request->txtPass);
		$user->master = $request->txtMaster;
		$user->profile = $request->txtProfile;
		$user->level = $request->level;

		$user->save();

		return redirect('admin/user/them')->with('thongbao','Thêm User thành công..');


	}
	public function getSua($id){
		$user = User::find($id);
		return view('admin.user.sua',['user'=>$user]);

	}
	public function postSua(Request $request,$id){
		$this->validate($request,
								[
									'txtUsername'  =>    'required|unique:users,username|min:5'
								],
								[
									'txtUsername.required'  =>  'Chưa Nhập Tên Người Dùng',
									'txtUsername.min'       =>  'Tên Người Dùng phải từ 5 ký tự trở lên',
									'txtUsername.unique'    =>  'Người Dùng Này Đã tồn tại'
								]);
		$user = User::find($id);
		$user->username = $request->txtUsername;
		$user->email = $request->txtMail;
		$user->master = $request->txtMaster;
		$user->profile = $request->txtProfile;
		$user->level = $request->level;
		if($request->changePass == "on"){
			$this->validate($request,
								[
									'txtPass'      =>    'required|min:5|max:32',
									'txtPassXN'    =>    'required|same:txtPass'
								],
								[

									'txtPass.required'      =>  'Chưa Nhập mật khẩu',
									'txtPass.min'           =>  'Mật Khẩu phải > 5 ký tự',
									'txtPass.max'           =>  'Mật khẩu phải <32 lý tự',
									'txtPassXN.required'    =>  'Chưa xác nhận mật khẩu',
									'txtPassXN.same'        =>  'Mật Khẩu Xác Nhậ không đúng'
								]);
			$user->password = bcrypt($request->txtPass);
		}
		$user->save();

		return redirect('admin/user/sua/'.$id)->with('thongbao','Đã Sửa User thành Công..');


	}
	public function getXoa($id){
		$user = User::find($id);
		$user->delete();
		return redirect('admin/user/danhsach')->with('thongbao','Xóa user thành công...');
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
    
}
