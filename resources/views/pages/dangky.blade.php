@extends('layout.index')
@section('content')
  <!-- Page Content -->
    <div class="container">
    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng ký tài khoản</div>
				  	@if(session('thongbao'))
				  	<div class="alert alert-success">
				  	{{session('thongbao')}}
				  	</div>
				  	@endif
				  	@if(count($errors)>0)
				  	@foreach($errors->all() as $err)
				  	<div class="alert alert-danger">
				  		{{$err}}
				  	</div>
				  	@endforeach
				  	@endif
				  	<div class="panel-body">
				    	<form action="dangky" method="POST" enctype="multipart/form-data">
				    		<div>
				    			<input type="hidden" name="_token" value="{{csrf_token()}}" required>
				    			<label>Username</label>
							  	<input type="text" class="form-control" placeholder="Username" name="username" aria-describedby="basic-addon1" required>
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1" required
							  	>
							</div>
							<div>
				    			<label>Profile</label>
							  	<textarea  class="form-control" rows="5" name="profile" placeholder="Nhập profile" required ></textarea
							  	>
							</div>
							<br>
							<div>
							<label>Ảnh đại diên</label>
                        	<input type="file" name="avatar" class="form-control" required>
                        	<br>
								
							</div>	
							<div>
				    			<label>Nhập mật khẩu</label>
							  	<input type="password" class="form-control" name="password" aria-describedby="basic-addon1" required>
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control" name="passwordAgain" aria-describedby="basic-addon1" required>
							</div>
							<br>
							<input type="submit" name="dangky" value="Đăng ký" />
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