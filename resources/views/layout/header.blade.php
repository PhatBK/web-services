<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="trangchu"><b style="color: cyan;">Ẩm Thực Bách Khoa</b></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="gioithieu"><b style="color:red;">Giới thiệu</b></a>
                    </li>
                    <li>
                        <a href="lienhe"><b style="color: red;">Liên hệ</b></a>
                    </li>
                </ul>

                <form class="navbar-form navbar-left" role="search" action="timkiem" method='post'>
			        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
			          <input type="text" class="form-control" placeholder="Search" name="tukhoa" id="search">
			        </div>
			        <button type="submit" class="btn btn-default" style="color:green;">Tìm kiếm</button>
			    </form>

			    <ul class="nav navbar-nav pull-right">
                    @if(!Auth::check())
                    <li>
                        <a href="dangky">Đăng ký</a>
                    </li>

                    <li>
                        <a href="dangnhap">Đăng nhập</a>
                    </li>
                    @endif
                    @if(Auth::user())
                    <li>

                    	<a href="nguoidung">
                            <img src="{{Auth::user()->avatar}}" style="height: 25px; width: 25px" />
                    		<!-- <span class ="glyphicon glyphicon-user" ></span> -->
                    		{{Auth::user()->username}}
                    	</a>
                    </li>
                    @endif
                    @if(Auth::check())
                    <li>
                    	<a href="dangxuat">Đăng xuất</a>
                    </li>
                    @endif
                    
                </ul>
            </div>


            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
