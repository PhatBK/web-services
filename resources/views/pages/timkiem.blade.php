  @extends('layout.index')
  <!-- Page Content -->
  @section('content')
    <div class="container" id="search_content">
        <div class="row">
          @include('layout.menu')
         
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
    <!-- end Page Content -->
@endsection
