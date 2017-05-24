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
                <form class="navbar-form navbar-left" action="" role="search" method='post' id="form">
			        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
			            <input type="text" class="form-control" placeholder="Tìm Món ?" name="tukhoa" id="search" onkeyup="sent()" required>
			        </div>
			        <button type="submit" id="timkiem" class="btn btn-default" style="background-color:#6D7B8D;color: yellow;" onclick="sent()">Tìm kiếm</button>
			    </form>
                <script type="text/javascript" charset="utf-8" async defer>
                   function sent(){
                        var key = document.getElementById("search").value;
                        var tukhoa = $('#search').val();
                        var form = document.getElementById("form");
                        form.action = "timkiem/tu-khoa="+tukhoa+".html";
                    } 
                </script>
                <form class="navbar-form navbar-left" accept-charset="utf-8">
                    <button class="form-control" id="time"></button>
                </form>
                <form class="navbar-form navbar-left" accept-charset="utf-8">
                    <button style="background-color: #EE9A49;" class="form-control" id="day"></button>
                </form>
                <script type="text/javascript" language="javascript">
                    function startTime(){

                        var today = new Date();
                        var h = today.getHours();
                        var m = today.getMinutes();
                        var s = today.getSeconds();

                        var d = today.getDate();
                        var mon = today.getMonth() +1;
                        var yer = today.getFullYear();
                        document.getElementById("day").innerHTML = d+"/"+mon+"/"+yer;
                      
                        m = checkTime(m);
                        s = checkTime(s);
                         document.getElementById("time").style.backgroundColor = "cyan";
                         document.getElementById("time").innerHTML = h + ":"+m+":"+s;
                         var t = setTimeout(function(){
                            startTime();
                         },500);
                    }
                    function checkTime(i){
                        if( i <10){
                            i = "0"+i;
                        }
                        return i;
                    }
                </script>
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
