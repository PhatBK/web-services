  @extends('layout.index')
  <!-- Page Content -->
  @section('content')
    <div class="container">
        <div class="row">
          @include('layout.menu')
         
            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>Tìm kiếm:{{$tukhoa}}</b></h4>
                    </div>
                    @foreach($monanTim as $ma)
                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="monan/{{$ma->id}}/{{ $ma->TieuDeKhongDau}}.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="upload/monan/{{$ma->Hinh}}" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3>{!!$ma->TieuDe!!}</h3>
                            <p>{!!$ma->TomTat!!}</p>
                            <a class="btn btn-primary" href="monan/{{$ma->id}}/{{$ma->TenMon}}.html">Chi tiết<span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                     @endforeach
                   

                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->
@endsection