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
                            {!! $cuahang->gioi_thieu !!}
                        </p>
                    </div>
                    <hr style="padding: 10px;">
                    <h3><span class="glyphicon glyphicon-link">Link:<b align="center">Web Site Của Cửa Hàng</b></span></h3>
                    <div class="media-heading list-group-item-info">
                        <a href="{{ $cuahang->link }}" target="_blank">
                         <h4 style="color:blue;text-align:left;">
                         <p align="center">
                             {{ $cuahang->link }}</h4>
                         </p>
                        </a>
                    </div>
                    <hr>
                    <br><br>
                    <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
                    <div class="break container"></div><br>
                     <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCeNkdz8H9gRA5kmf605jC2xaniq55lhns&q={{$cuahang->vi_chi}}"
                     width="820" height="500" frameborder="0" style="border:0;" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection