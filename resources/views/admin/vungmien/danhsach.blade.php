@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Vùng Miền
                <small>(danh sách)</small>
                </h1>
            </div>

             @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
             @endif

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Tên Không Dấu</th>
                        <th>Giới Thiệu</th>
                        <th>Ngày Đăng</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vungmien as $vm)
                    <tr class="odd gradeX" align="center">
                        <td>{{$vm->id}}</td>
                        <td>{{$vm->ten}}</td>
                        <td>{{$vm->ten_khong_dau}}</td>
                        <td>{{$vm->info}}</td>
                        <td>{{$vm->created_at}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/vungmien/xoa/{{$vm->id}}">Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/vungmien/sua/{{$vm->id}}">Sửa</a></td>
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