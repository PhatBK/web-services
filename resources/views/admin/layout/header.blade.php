        <!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('admin/theloai/danhsach') }}">Admin - BK Food</a>
            </div>
            <!-- /.navbar-header -->
           
                  
            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <img src="{{Auth::user()->avatar}}" height="35px" width="35px"/>
                         <i class="fa fa-caret-down"></i>
                    </a>
                   <ul class="dropdown-menu dropdown-user">
                        @if (Auth::user())

                            <li>
                              <a><i class="fa fa-user fa-fw"></i>{{Auth::user()->username}}</a>
                            </li>
                            <li>
                            <a href="admin/user/sua/{{Auth::user()->id}}"><i class="fa fa-gear fa-fw"></i>Cài Đặt</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="admin/logout"><i class="fa fa-sign-out fa-fw"></i>Đăng Xuất</a>
                            </li>
                        @endif
                    </ul>
         
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
        @include('admin.layout.menu')
</nav>
            <!-- /.navbar-static-side -->