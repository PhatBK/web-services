@extends('admin.layout.index')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Cửa Hàng Liên Kết:
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
                                <th>Tên</th>
                                <th>Tên Không Dấu</th>
                                <th>Giới Thiệu</th>
                                <th>Link</th>
                                <th>Vị Trí</th>
                                <th>Ngày Đăng</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cuahang_ds as $ch)
                               <tr class="odd gradeX" align="center">
                                    <td>{{$ch->id}}</td>
                                    <td>{{$ch->ten}}</td>
                                    <td>{{$ch->ten_khong_dau }}</td>
                                    <td>{!! $ch->gioi_thieu !!}</td>
                                    <td>{!! $ch->link !!}</td>
                                    <td>{{$ch->vi_chi}}</td>
                                    <td>{{ $ch->created_at }}</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/cuahang/xoa/{{$ch->id}}">Xoá</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/cuahang/sua/{{$ch->id}}">Sửa</a></td>
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
