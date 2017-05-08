@extends('layout.index')
@section('content')

<div class="container">

   @include('layout.slide')

    <div class="space20"></div>
    <div class="row main-left">

        @include('layout.menu')

        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                    <h2 style="margin-top:0px; margin-bottom:0px;">{{ $cuahang->ten }}</h2>
                </div>
                <div class="panel-body">
                    <!-- item -->
                    <h3><span class="glyphicon glyphicon-align-left"></span>Giới Thiệu Về Cửa Hàng:</h3>
                    <div class="form-group">
                         <p>
                            {{ $cuahang->gioi_thieu }}
                        </p>
                    </div>
                    <h3><span class="glyphicon glyphicon-align-left"></span>Link:</h3>
                    <div class="media-heading list-group-item-info">
                        <a href="{{ $cuahang->link }}" target="_blank">
                         <h4 style="color:blue;text-align:left;">
                         <p>
                             {{ $cuahang->link }}</h4>
                         </p>
                        </a>
                    </div>
                    <br><br>
                    <h3><span class="glyphicon glyphicon-link">Vị Trí:</h3>

                    <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
                    <div class="break"></div><br>
                    <iframe src="{{$cuahang->vi_chi }}"
                     width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection