        @extends('admin.layout.index')
        @section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Món Ăn
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
                                <th>Thể Loại</th>
                                <th>Loai Món</th>
                                <th>VungMien</th>
                                <th>Tiêu Đề</th>
                                <th>Tiêu Đề Không Dấu</th>
                                <th>Tên Món</th>
                                <th>Tóm Tắt</th>
                                <th>Nội Dung</th>
                                <th>Video Hướng dẫn</th>
                                <th>Chú Ý</th>
                                <th>Nổi Bật</th>
                                <th>Số Lượt Xem</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($monan as $ma)
                            <tr class="odd gradeX" align="center">
                                <td>{{$ma->id}}</td>
                                <td>{{$ma->loaimon->theloai->ten}}</td>
                                <td>{{$ma->loaimon->ten}}</td>
                                <td>{{$ma->vungmien->ten}}</td>
                                <td>{{$ma->TieuDe}}</td>
                                <td>{{$ma->TieuDeKhongDau}}</td>
                                <td><p>{{$ma->TenMon}}</p>
                                    <img width="100px" height="100px" src="upload/monan/{{$ma->Hinh}}" />
                                </td>
                                <td>{!!$ma->TomTat!!}</td>
                                <td>{!!$ma->NoiDung!!}</td>
                                <td>{{$ma->link}}</td>
                                <td>{{$ma->Chu_Y}}</td>
                                <td>
                                    @if ($ma->NoiBat == 0)
                                        {{'Không'}}
                                    @else
                                        {{'Có'}}
                                    @endif
                                </td>
                                <td>{{$ma->SoLuotXem}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/monan/xoa/{{$ma->id}}">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/monan/sua/{{$ma->id}}">Sửa</a></td>
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
