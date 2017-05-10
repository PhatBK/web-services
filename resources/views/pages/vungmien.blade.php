  @extends('layout.index')
  <!-- Page Content -->
  @section('content')
    <div class="container">
        <div class="row">
          @include('layout.menu')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:green; color:white;">
                        <h3 align="center"><b style="color:white;">{{$vungmienMon->ten}}</b></h3>
                       
                    </div>
                    <h4>Giới Thiệu:</h4>
                    <div class="media-heading list-group-item-info">
                      <small>
                        <h4>
                             <b>
                                {{$vungmienMon->info}}
                             </b>
                        </h4>
                      </small>
                    </div>
                     <hr size="10px">
                     <h3><p align="center">Danh Sách Các Món Ăn:</p></h3>
                     <hr size="10px">
                    @foreach($monan as $ma)
                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="monan/{{$ma->id}}/{{ $ma->TieuDeKhongDau }}.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="upload/monan/{{$ma->Hinh}}" alt="">
                            </a>
                            <hr>
                            <p><span class="glyphicon glyphicon-time"></span>Ngày Đăng: {{$ma->created_at}}</p>
                        </div>

                        <div class="col-md-9">
                            <h3>{{$ma->TieuDe}}</h3>
                            <h3>{{$ma->TenMon}}</h3>
                            <p>{!!$ma->TomTat!!}</p>
                            <a class="btn btn-primary" href="monan/{{$ma->id}}/{{ $ma->TieuDeKhongDau }}.html">Chi tiết<span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                     @endforeach
                <!--phân trang cho page vungmien-->
                <div style="text-align: center; ">
                     {{$monan->links()}}
                </div>
                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->
@endsection