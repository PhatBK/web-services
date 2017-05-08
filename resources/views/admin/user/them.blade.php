@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Người Dùng
                <small>(thêm)</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
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
                <form action="admin/user/them" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Tên Người Dùng</label>
                        <input class="form-control" name="txtUsername" placeholder="Vui Lòng Nhập Tên Người Dùng !!!" />
                    </div>
                    <div class="form-group">
                        <label>Địa Chỉ Email</label>
                        <input type="email" class="form-control" name="txtMail" placeholder="Vui Lòng Nhập Mail Người Dùng !!!" />
                    </div>
                    <div class="form-group">
                        <label>Mật Khẩu</label>
                        <input type="password" class="form-control" name="txtPass" placeholder="Vui Lòng Nhập Password !!!" />
                    </div>
                    <div class="form-group">
                        <label>Xác Nhận Mật Khẩu</label>
                        <input type="password" class="form-control" name="txtPassXN" placeholder="Vui Lòng Nhập Lại Password !!!" />
                    </div>
                    <div class="form-group">
                        <label>Trình Độ</label>
                        <input class="form-control" name="txtMaster" placeholder="Vui Lòng Nhập Trình độ !!!" />
                    </div>
                    <div class="form-group">
                        <label>Profile</label>
                        <textarea class="form-control" rows="3" name="txtProfile"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Level:</label>
                        <label class="radio-inline">
                            <input name="level" value="2" checked="" type="radio">Customer
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="1"  type="radio">Admin-add
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
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