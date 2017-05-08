@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại Món
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
                        <th>Loại Món Ăn</th>
                        <th>Thể Loại</th>
                        <th>Tên Không Dấu</th>
                        <th>Ngày Đăng</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loaimon as $lm)
                    <tr class="odd gradeX" align="center">
                        <td>{{$lm->id}}</td>
                        <td>{{$lm->ten}}</td>
                        <td>{{$lm->theloai->ten}}</td>
                        <td>{{$lm->ten_khong_dau}}</td>
                        <td>{{$lm->created_at}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/loaimon/xoa/{{$lm->id}}">Xoá</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaimon/sua/{{$lm->id}}">Sửa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection