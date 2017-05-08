@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Vùng Miền
                <small>{{$vungmien->ten}}</small>
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

                <form action="admin/vungmien/sua/{{$vungmien->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Vùng Miền</label>
                        <input class="form-control" name="txtTen" placeholder="Vui Lòn Nhập Vùng Miền Mà Bạn Muốn Thay Đổi" value="{{$vungmien->ten}}" />
                    </div>
                    <div class="form-group">
                        <label>Giới Thiệu Vùng Miền</label>
                        <textarea class="form-control" rows="3" name="txtInfo">{{$vungmien->info}}</textarea>
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