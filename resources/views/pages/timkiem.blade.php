  <!DOCTYPE html>
<html lang="en">

<head>

    <link rel="shortcut icon" href="logo_user/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BK Foods-Cooking</title>
    <base href="{{asset('')}}">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">





    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
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
                      <input type="text" class="form-control" placeholder="Search" name="tukhoa" id="search_text">
                    </div>
                    <button type="submit" class="btn btn-default" style="color:green;" id="search">Tìm kiếm</button>
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

   

  <div class="container" id="search_content">
        <div class="row">
          <!-- @include('layout.menu') -->

<div class="col-md-3 ">
        <ul class="list-group" id="menu">
                <li href="#" class="list-group-item menu1 active">
                <span class="glyphicon glyphicon-th-list"></span>Thể Loại
                </li>
            @foreach ($theloai as $tl)
                @if(count($tl->loaimon) > 0)
                    <li href="#" class="list-group-item menu1">
                       {{$tl->ten}}
                    </li>
                        <ul>
                            @foreach ($tl->loaimon as $lm)
                                @if(count($lm->monan)>0)
                                <li class="list-group-item">
                                    <a href="loaimon/{{$lm->id}}/{{$lm->ten_khong_dau}}.html">{{$lm->ten}}</a>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                @endif
            @endforeach
        </ul>
        <ul class="list-group" id="menu">
                <li href="#" class="list-group-item menu1 active">
                    <p style="color: #40ff00;"><span class="glyphicon glyphicon-globe"></span>Món Ăn Vùng Miền</p>
                </li>
            @foreach ($vungmien as $vm)
                @if(count($vm->monan) > 0)
                    <li href="#" class="list-group-item menu1">
                       <a href="vungmien/{{ $vm->id }}/{{ $vm->ten_khong_dau }}.html">{{$vm->ten}}</a> 
                    </li>
                @endif
            @endforeach
        </ul>
        <ul class="list-group" id="menu">
                <li href="#" class="list-group-item menu1 active">
                    <p  style="color: #00ff00;"><span class="glyphicon glyphicon-user"></span>Thành Viên Ưu Tú</p>
                </li>
                            
                @foreach($thanhvienuutu as $tv)
                        <li href="#" class="list-group-item menu1">
                            <p style="color: red;"> <a > {!!"$tv->username&nbsp"!!}</a> {{"Vote:$tv->master"}}</p>
                        </li>
                @endforeach
        </ul>
        <ul class="list-group" id="menu">
                <li href="#" class="list-group-item menu1 active">
                    <p><span class="glyphicon glyphicon-link"></span>Cửa Hàng Cộng Tác</p>
                </li>
            @foreach ($cuahangAll as $ch)
                        <li class="list-group-item">
                            <a href="cuahang/{{ $ch->id }}/{{ $ch->ten_khong_dau }}.html">{{ $ch->ten }}</a> 
                        </li>
            @endforeach
        </ul>
</div>

         
            <div class="col-md-9 ">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h4>Bạn Đang Tìm Kiếm Món :<b style="font-size: 20px;color:red;">{{$tukhoa}}</b></h4>

                    </div>
                    <div id='search_content'>
                    @foreach($monanTim as $ma)
                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="monan/{{$ma->id}}/{{ $ma->TieuDeKhongDau}}.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="upload/monan/{{$ma->Hinh}}" alt="">
                            </a>
                            <hr>
                            <a href="monan/{{$ma->id}}/{{ $ma->TieuDeKhongDau}}.html">
                                Món Ăn:<b>{{ $ma->TenMon }}</b>
                            </a>
                            <hr>
                            <p><span class="glyphicon glyphicon-time"></span>Ngày Đăng: {{$ma->created_at}}</p>
                        </div>

                        <div class="col-md-9">
                            <h3>{!!$ma->TieuDe!!}</h3>
                            <b>Tóm Tắt:</b>
                            <p>{!!$ma->TomTat!!}</p>
                            <a class="btn btn-primary" href="monan/{{$ma->id}}/{{$ma->TenMon}}.html">Chi tiết<span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                     @endforeach
                     </div>
                     <div style="text-align: center; ">
                         {{$monanTim->links()}}
                     </div>
                </div>
            </div> 
        </div>
    </div>

     <div align="center">
         <div class="fb-comments " data-href="http://localhost/Web-Service/public/trangchu" data-numposts="5"></div>
     </div>
    <footer>
    <div class="row">
        <div class="col-md-12">
            <p align="center" style="color: blue;">Copyright &copy;Template:<a href="https://www.w3schools.com/bootstrap/default.asp" target="_blank">Bootstrap 3</a></p>
            <p align="center" style="color: red;">Development:Team Bách Khoa Hà Nội</p>
        </div>
    </div>
</footer>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>
    <script>
        $(document).ready(function(){
            $("#search").onclick(function(){
                var tukhoa = $("search_text").val();
                $.get("admin/ajax/search/"+tukhoa,function(data){
                    $("#search_content").html(data);
                });
            });
        });
    </script>

    

    </div>
</body>

</html>
