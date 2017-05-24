@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Món Ăn
                <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        {{$err}} <br />
                    @endforeach
                </div>
            @endif
            @if (session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <div class="col-lg-7" style="padding-bottom:120px">

                <form action="admin/monan/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Thể Loại</label>
                        <select class="form-control" name="sltTheLoai" id="theloai">
                           @foreach ($theloai as $tl)
                               <option value="{{$tl->id}}">{{$tl->ten}}</option>
                           @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại Món</label>
                        <select class="form-control" name="sltLoaiMon" id="loaimon">
                           @foreach ($loaimon as $lm)
                               <option value="{{$lm->id}}">{{$lm->ten}}</option>
                           @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Vùng Miền</label>
                        <select class="form-control" name="sltVungMien">
                           @foreach ($vungmien as $vm)
                               <option value="{{$vm->id}}">{{$vm->ten}}</option>
                           @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu Đề</label>
                        <input class="form-control" name="TieuDe" placeholder="Vui Lòng Nhập Tiêu Đề.." required/>
                    </div>
                    <div class="form-group">
                        <label>Tên Món</label>
                        <input class="form-control" name="TenMon" placeholder="Vui Lòng Nhập Tên Món.." required/>
                    </div>
                    <div class="form-group">
                        <label>Tóm Tắt</label>
                        <textarea id="demo" class="form-control ckeditor" rows="3" name="TomTat"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea id="demo" class="form-control ckeditor" rows="3" name="NoiDung"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình Ảnh</label>
                        <input type="file" name="Hinh" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label>Chú Ý Về Món Ăn </label>
                        <textarea class="form-control" rows="3" name="Chu_Y"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Link Video Hướng dẫn</label>
                        <input class="form-control" name="link" placeholder="Vui lòng nhập link hướng dẫn món ăn.." required/>
                    </div>
                    <div class="form-group">
                        <label>Nổi Bật</label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="1" checked="" type="radio">Có
                        </label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="0" type="radio">Không
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm Món Ăn</button>
                    <button type="reset" class="btn btn-default">Đặt Lại Mặc Định</button>
                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
        <!-- /#page-wrapper -->
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
@endsection
