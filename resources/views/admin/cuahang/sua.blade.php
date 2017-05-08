@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cửa Hàng:
                <small><b align="center" style="color:green;">{{$cuahang->ten}}</b></small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                       @foreach ($errors->all() as $err)
                           {{$err}}
                       @endforeach
                    </div>
                @endif
                @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif

                <form action="admin/cuahang/sua/{{$cuahang->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Tên Cửa Hàng</label>
                        <input class="form-control" name="ten" placeholder="Vui Lòng Nhập Tên Cửa Hàng Liên Kết.."  value="{{$cuahang->ten }}" />
                    </div>
                    <div class="form-group">
                        <label>Giới Thiệu</label>
                        <textarea id="demo" class="form-control ckeditor" rows="3" name="gioi_thieu">
                            {!! $cuahang->gioi_thieu !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input class="form-control" name="link" placeholder="Vui Lòng Nhập Link Liên Kết ..." value="{{$cuahang->link }}" />
                    </div>
                    <div class="form-group">
                        <label>Vị Chí</label>
                        <input class="form-control" name="vi_chi" placeholder="Vui Lòng Nhập Vị Chí Cửa Hàng..." value="{{$cuahang->vi_chi }}" />
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Đặt Lại Mặc Định</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection