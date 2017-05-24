@extends('layout.index')
 <!-- Page Content -->
 @section('content')
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Thông tin tài khoản</div>
				  	@if(count($errors)>0)
				  	@foreach($errors as $err)
				  		<div class="alert alert-danger">
				  			{{$err}}

				  		</div>
				  	@endforeach
				  	@endif
				  	@if(session('thongbao'))
				  	<div class="alert alert-success">
				  		{{session('thongbao')}}
				  	</div>
				  	@endif
				  	<div class="panel-body">
				  		<?php 
				  		      $nguoidung=Auth::user();
				  		?>
				    	<form action="nguoidung" method="post" enctype="multipart/form-data">
				    		<input type="hidden" name="_token" value="{{csrf_token()}}">
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" value="{{$nguoidung->username}}" placeholder="Nhập họ tên" name="username" aria-describedby="basic-addon1" required>
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" value="{{$nguoidung->email}}" name="email" aria-describedby="basic-addon1"
							  	disabled
							  	>
							</div>
							<div>
				    			<label>Profile</label>
							  	<textarea class="form-control" placeholder="Nhập profile" rows="5" name="profile">{{$nguoidung->profile}}</textarea>
							</div>
							<br>	
							<div>
							<div>
							<label>Cập nhật ảnh đại diên</label>
                        	<input type="file" name="avatar" class="form-control" required />
                        	<br>
							</div>	
								<input type="checkbox"  name="changePassword" id="changePassword">
				    			<label>Đổi mật khẩu</label>
							  	<input type="password" class="form-control password" name="password" aria-describedby="basic-addon1" disabled="" required>
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control password" name="passwordAgain" aria-describedby="basic-addon1" disabled="" required>
							</div>
							<br>
							<button type="submit" class="btn btn-default">Sửa
							</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
			$("#changePassword").change(function(){
				if($(this).is(":checked")){
					$(".password").removeAttr('disabled');

				}else{
					$(".password").attr('disabled','');
				}
			});
	});
</script>
@endsection
