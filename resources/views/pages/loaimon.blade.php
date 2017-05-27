  @extends('layout.index')
  <!-- Page Content -->
  @section('content')
    <div class="container">
        <div class="row">
          @include('layout.menu')

            <div class="col-md-9 ">

                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:green; color
                    :white;">
                        <h4><b>{{$loaimon->ten}}</b></h4>
                    </div>
                 <!-- Phần Nội dung của trang :loại Món -->
                <div id="loaimon">
                   @foreach($monan as $ma)
                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="monan/{{$ma->id}}/{{$ma->TenMon}}.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="upload/monan/{{$ma->Hinh}}" alt="">
                            </a>
                            <p><span class="glyphicon glyphicon-eye-open"></span>Số Lượt Xem:<b style="color: red;">{{$ma->SoLuotXem}}</b>
                            </p>                          
                            <a href="monan/{{$ma->id}}/{{$ma->TenMon}}.html">
                                Món Ăn:<b>{{ $ma->TenMon }}</b>
                            </a>
                            <hr>
                            <p><span class="glyphicon glyphicon-time"></span>Ngày Đăng: {{$ma->created_at}}</p>
                        </div>

                        <div class="col-md-9">
                            <h2>{{$ma->TieuDe}}</h3>
                            <b>Tóm Tắt:</b>
                            <p>{!!$ma->TomTat!!}</p>
                            <a class="btn btn-primary" href="monan/{{$ma->id}}/{{ $ma->TieuDeKhongDau }}.html">Chi tiết<span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    @endforeach
                    
                </div>
                <!--Kết thúc phần nội dung của trang Loại Món-->

                <!--phân trang cho font-and sử dụng hàm có sẵn trong Laravel frameword-->
                        <div style="text-align: center; ">
                             {{$monan->links()}}
                        </div>
                </div>
            </div> 
        </div>
    </div>
    <!-- end Page Content -->
@endsection
