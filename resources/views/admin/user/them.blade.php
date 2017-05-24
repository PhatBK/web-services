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
                <form action="admin/user/them" method="POST"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Tên Người Dùng</label>
                        <input class="form-control" name="username" placeholder="Vui Lòng Nhập Tên Người Dùng !!!" required />
                    </div>
                    <div class="form-group">
                        <label>Địa Chỉ Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Vui Lòng Nhập Mail Người Dùng !!!" required />
                    </div>
                    <div class="form-group">
                        <label>Mật Khẩu</label>
                        <input type="password" class="form-control" name="password" placeholder="Vui Lòng Nhập Password !!!" required />
                    </div>
                    <div class="form-group">
                        <label>Xác Nhận Mật Khẩu</label>
                        <input type="password" class="form-control" name="passwordAgain" placeholder="Vui Lòng Nhập Lại Password !!!" required />
                    </div>
                    <div class="form-group">
                        <label>Trình Độ</label>
                        <input class="form-control" name="master" placeholder="Vui Lòng Nhập Trình độ !!!" required />
                    </div>
                    <div class="form-group">
                        <label>Profile</label>
                        <textarea class="form-control" rows="3" name="profile"></textarea>
                    </div>
                    <div>
                            <label>Ảnh đại diên</label>
                            <input type="file" name="avatar" class="form-control" required />
                            <br>
                    </div>  
                    <div class="form-group">
                        <label>Level:</label>
                        <label class="radio-inline">
                            <input name="level" value="3" checked="" type="radio">Customer
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