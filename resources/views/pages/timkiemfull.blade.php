@extends('layout.index')
  <!-- Page Content -->
  @section('content')
    <div class="container" id="search_content">
        <div class="row">
          @include('layout.menu')
         
            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>Tìm kiếm:{{$tukhoa}}</b></h4>
                    </div>
                    <div id='search_content'>
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
    </div>
    <!-- end Page Content -->
   
{{--<div>
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.3/webfont.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/mootools/1.5.0/mootools-yui-compressed.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/ext-core/3.1.0/ext-core.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="{{asset('js/ajaxscript.js')}}"></script>
</div>
  --}}

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#theloai").change(function(){
                var idTheLoai = $(this).val();
                $.get("admin/ajax/loaimon/"+idTheLoai,function(data){
                    $("#loaimon").html(data);
                });
            });
        });
    </script>
@endsectionJqery

<!--viết code cho mã tìm kiếm bằng Ajax:-->

