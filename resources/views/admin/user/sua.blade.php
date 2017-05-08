@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Người Dùng
                <small>{{$user->username}}</small>
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
                <form action="admin/user/sua/{{$user->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Tên Người Dùng</label>
                        <input class="form-control" name="txtUsername" value="{{$user->username}}" placeholder="Vui Lòng Nhập Tên Người Dùng !!!" />
                    </div>
                    <div class="form-group">
                        <label>Địa Chỉ Email</label>
                        <input class="form-control" name="txtMail" value="{{$user->email}}" placeholder="Vui Lòng Nhập Mail Người Dùng !!!" readonly="" />
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="changePass" id="changePass">
                        <label>Đổi Mật Khẩu</label>
                        <input type="password" class="form-control password" name="txtPass" placeholder="Nhập Password Mới !!!"  disabled="">
                    </div>
                    <div class="form-group">
                        <label>Xác Nhận Mật Khẩu</label>
                        <input type="password" class="form-control password" name="txtPassXN" placeholder="Nhập Lại Password Mới !!!" disabled="" />
                    </div>
                    <div class="form-group">
                        <label>Master</label>
                        <input class="form-control" name="txtMaster" value="{{$user->master}}" placeholder="Vui Lòng Nhập Trình độ !!!" />
                    </div>
                    <div class="form-group">
                        <label>Profile</label>
                        <textarea class="form-control" rows="3" name="txtProfile">
                            {{$user->profile}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Level:</label>
                        <label class="radio-inline">
                            <input name="level" value="2" 
                            @if ($user->level == 2)
                                {{"checked"}}
                            @endif
                             type="radio">Customer
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="1"
                            @if ($user->level == 1)
                                {{"checked"}}
                            @endif
                              type="radio">Admin-add
                        </label>
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
@section('script')
    <script>
        $(document).ready(function(){
            $("#changePass").change(function(){
                if($(this).is(":checked")){
                        $(".password").removeAttr('disabled');
                }else{
                        $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection