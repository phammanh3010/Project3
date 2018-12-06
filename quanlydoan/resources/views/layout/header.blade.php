<nav class="navbar navbar-default navbar-fixed-top navbar-light">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                    aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="row">
                    <div class="col-lg-3 navbar-left" id="contact">
                        <p></p>
                        <p><span class="glyphicon glyphicon-map-marker"></span> P603_604
                            B1 &nbsp;
                            <span class="glyphicon glyphicon-earphone"></span> (84-4) 3
                            8696124</p>
                    </div>
                    <!-- <div class="col-lg-5">
                        <form class="navbar-form navbar-right">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-outline-primary"><span class="glyphicon glyphicon-search"></button>
                        </form>
                    </div> -->
                    <div class="col-lg-4 navbar-right">
                        <ul class="nav navbar-nav">
                            <li><a href="teacher/">ĐỒ ÁN</a></li>
                            <li class="dropdown nav-item">
                                <a href="#note" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell">
                                        <span class="badge badge-danger">1</span>
                                    </i>
                                </a>
                                <ul class="dropdown-menu notifications">
                                    <div class="notification-heading">
                                        <h3 class="menu-title">Thông báo</h3>
                                    </div>
                                    <li class="divider"></li>
                                    <div class="notifications-wrapper">
                                        <a class="content" href="#">
                                            <div class="notification-item">
                                                <p class="item-infor">Deadline:21/10/2018: Nộp tài liệu SRS</p>
                                            </div>
                                        </a>
                                        <a class="content" href="#">
                                            <div class="notification-item">
                                                <p class="item-infor">Deadline:21/10/2018: Nộp tài liệu SRS</p>
                                            </div>
                                        </a>
                                    </div>
                                </ul>
                            </li>
                            <li><a href="profile_student.html"></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="false"> <span><i class="icon_profile"></i>
                                    @if(Auth::user())
                                        {{Auth::user()->full_name}}
                                    @else
                                        {{route('/')}}
                                    @endif
                                    </span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="profile_student.html"><i class="glyphicon glyphicon-user"></i> THÔNG
                                            TIN CÁ NHÂN</a></li>
                                    <li><a href="update_password.html"><i class="glyphicon glyphicon-lock"></i> ĐỔI MẬT
                                            KHẨU</a></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                            
                                       <i class="glyphicon glyphicon-off"></i> ĐĂNG XUẤT     </a>    
                                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
