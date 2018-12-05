        <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="../home.html" class="logo">Admin<span class="lite"></span></a>
            <!--logo end-->
            <div class="top-nav notification-row">
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/profile.png" width="40px" height="40px">
                            </span>
                            <span class="username">
                                
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="../personal/update_pass.html"><i class="icon_profile"></i>Đổi mật khẩu</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                            
                            <i class="glyphicon glyphicon-off"></i> ĐĂNG XUẤT   </a>    
                             <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 {{ csrf_field() }}
                             </form>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
        </header>
