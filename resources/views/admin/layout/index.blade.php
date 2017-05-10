<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="shortcut icon" href="logo_admin/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">
    <title>Admin - BK Food</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="admin_tem/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_tem/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_tem/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_tem/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="admin_tem/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin_tem/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

<body>

                <div id="wrapper">
                        @include('admin.layout.header')
                        @yield('content')
                </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin_tem/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_tem/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_tem/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin_tem/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="admin_tem/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin_tem/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    <script type="text/javascript" language="javascript" src="admin_tem/ckeditor/ckeditor.js" ></script>

    @yield('script')
</body>
<div class="form-group">
    <footer>
            <p align="center">Developers:   <a href="" target="_blank" color="red">Phát Nguyễn</a>,
                                            <a href="" target="_blank">Phú Nguyễn</a>,
                                            <a href=""  target="_blank">Nghĩa Trần</a>,
                                            <a href="" target="_blank">Thắng Nguyễn</a>
             <br/><a href="https://www.hust.edu.vn/" target="_blank">Team : Bách Khoa Hà Nội</a>
            </p>
    </footer>
</div>
</html>
