@extends('layout.index')
@section('content')
 <!-- Page Content -->
    <div class="container">

    	@include('layout.slide')

        <div class="space20"></div>


        <div class="row main-left">
          @include('layout.menu')

            <div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:green; color:white;" >
	            	<!--<h2 style="margin-top:0px; margin-bottom:5px; padding-left: 250px;">Ẩm Thực Bách Khoa</h2>-->
	            		<h2 style="margin-top:0px; margin-bottom:5px;text-align: center;">Ẩm Thực Bách Khoa</h2>
	            		<p align="center" style="color:cyan;">(Ngon + Bổ + Rẻ + Nhanh + Đảm Bảo An Toàn)</p>
	            	</div>
	            </div>

	            	<div class="panel-body">
	            		@foreach($theloai as $tl)
	            		@if(count($tl->monan)>0)
	            		<!-- item -->
					    <div class="row-item row">
		                	<h3>
		                		<a >{!!$tl->ten!!}</a>  	
		                		@foreach($tl->loaimon as $lm)
		                		<small><a href="loaimon/{{$lm->id}}/{{ $lm->ten_khong_dau }}.html">
		                		      <i>{!!$lm->ten!!}</i> | </a>
		                		</small>
								@endforeach		                		
		                	</h3>
		                	<?php  
		                	$data =$tl->monan->where('NoiBat','1')->sortByDesc('created_at')->take(5);
		                	$mon1=$data->shift();
		                	  ?>
		                	<div class="col-md-8 border-right">
		                		<div class="col-md-5">
			                        <a href="monan/{{$mon1['id']}}/{{$mon1['TenMon']}}.html">
			                            <img class="img-responsive" src="upload/monan/{{$mon1['Hinh']}}" alt="">
			                        </a>
			                        <hr>
			                        <div>
										<p><span class="glyphicon glyphicon-time"></span>Ngày Đăng: {{$mon1['created_at']}}</p>
									</div>
			                    </div>

			                    <div class="col-md-7">
			                        <a href="monan/{{$mon1['id']}}/{{ $mon1['TieuDeKhongDau'] }}.html"><h3>{!!$mon1['TieuDe']!!}</h3></a>
			                        <p>{!!$mon1['TomTat']!!}</p>
			                        <a class="btn btn-primary" href="monan/{{$mon1['id']}}/{{ $mon1['TieuDeKhongDau'] }}.html">Chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>

		                	</div>
		                    

							<div class="col-md-4">
							@foreach($data->all() as $ma)
								<a href="monan/{{$ma['id']}}/{!! $ma['TieuDeKhongDau'] !!}.html">
									<h4>
										<span class="glyphicon glyphicon-list-alt"></span>
										{!!$ma['TieuDe']!!}
									</h4>
								</a>
							@endforeach
							</div>
							
							<div class="break"></div>
		                </div>
		                <!-- end item -->
		                <!-- item -->
		                @endif
					  @endforeach 

					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection
