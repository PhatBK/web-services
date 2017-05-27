 @extends('layout.index')
 @section('content')
 <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng nhập</div>
				  	@if(session('thongbao'))
				  		<div class="alert alert-danger">
				  			{{session('thongbao')}}
				  		</div>
				  	@endif
				  	<div class="panel-body">
				    	<form action="dangnhap" method="POST">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
				    			<label>Tên Đăng Nhập:</label>
							  	<input type="text" class="form-control" placeholder="Username" name="username" required
							  	>
							</div>
							<div>
				    			<label>Mật Khẩu:</label>
							  	<input type="password" class="form-control" name="password" required>
							</div>
							<br />				
							<input  type="submit" class="form-control" value="Đăng nhập" />
							<br />
							<br />
							<a href="{{route('facebook.login')}}" class="form-control" style="text-align: center;color: blue;">Facebook Login</a>
							<a href="{{route('google.login')}}" class="form-control" style="text-align: center;color: red;">Google+ Login</a>
							</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>
 @endsection