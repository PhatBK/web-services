@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Món Ăn
                    <small>{{$monan->TieuDe}}</small>
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
            @if (session('loi'))
                <div class="alert alert-danger">{{session('loi')}}</div>
            @endif
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/monan/sua/{{$monan->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Thể Loại</label>
                        <select class="form-control" name="sltTheLoai" id="theloai">
                           @foreach ($theloai as $tl)
                                <option
                                    @if ($monan->loaimon->theloai->id == $tl->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$tl->id}}">{{$tl->ten}}
                                </option>
                           @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại Món</label>
                        <select class="form-control" name="sltLoaiMon" id="loaimon">
                           @foreach ($loaimon as $lm)
                                <option 
                                    @if ($monan->loaimon->id == $lm->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$lm->id}}">{{$lm->ten}}
                                </option>
                           @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Vùng Miền</label>
                        <select class="form-control" name="sltVungMien">
                           @foreach ($vungmien as $vm)
                               <option
                                      @if ($monan->vungmien->id == $vm->id)
                                          {{"selected"}}
                                      @endif
                                      value="{{$vm->id}}">{{$vm->ten}}
                                </option>
                           @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu Đề</label>
                        <input class="form-control" name="TieuDe" placeholder="Vui Lòng Nhập Tiêu Đề.."
                        value="{{$monan->TieuDe}}" />
                    </div>
                    <div class="form-group">
                        <label>Tên Món</label>
                        <input class="form-control" name="TenMon" placeholder="Vui Lòng Nhập Tên Món.." 
                        value="{{$monan->TenMon}}" />
                    </div>
                    <div class="form-group">
                        <label>Tóm Tắt</label>
                        <textarea id="demo" class="form-control ckeditor" rows="3" name="TomTat">
                            {{$monan->TomTat}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea id="demo" class="form-control ckeditor" rows="3" name="NoiDung">
                            {{$monan->NoiDung}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình Ảnh</label>
                        <p><img with="500px" height="400px"  src="upload/monan/{{$monan->Hinh}}" /></p>
                        <input type="file" name="Hinh" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Chú Ý Về Món Ăn </label>
                        <textarea class="form-control" rows="3" name="Chu_Y">
                            {{$monan->Chu_Y}}
                        </textarea>
                    </div>
                    <div class="form-group">
                    <label>Link Video hướng dẫn</label>
                    <input class="form-control" name="link" placeholder="Nhập link video hướng dẫn" value="{{$monan->link}}"/>
                    </div>
                    <div class="form-group">
                        <label>Nổi Bật</label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="1" 
                                @if ($monan->NoiBat == 1)
                                   {{"checked"}}
                                @endif
                             type="radio">Có
                        </label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="0"
                                @if ($monan->NoiBat == 0)
                                    {{"checked"}}
                                @endif
                             type="radio">Không
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Đặt Lại Mặc Định</button>
                    <form>
                    </div>
                </div>
                <!-- /.row -->
    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bình Luận
                            <small>(danh sách)</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if (session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                     <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Nội dung</th>
                                <th>Đánh Giá</th>
                                <th>Ngày đăng</th>
                                <th>Người Đăng</th>
                                <th>Mail</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comment as $cm)
                                <tr class="odd gradeX" align="center">
                                <td>{{$cm->id}}</td>
                                <td>{{$cm->NoiDung}}</td>
                                <td>{{$cm->DanhGia}}</td>
                                <td>{{$cm->created_at}}</td>
                                <td><p>{{$cm->user->username}}</p></td>
                                <td>{{$cm->user->email}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$cm->id}}/{{$monan->id}}">Xóa</a></td>
                            @endforeach
                        </tbody>
                    </table>
    </div>
                <!--end row-->
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
