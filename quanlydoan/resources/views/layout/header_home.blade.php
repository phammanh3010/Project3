<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed"
            data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
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
                Nhà B1 &nbsp;
                <span class="glyphicon glyphicon-earphone"></span> (84-4) 3
                8696124</p>
            </div>
            <div class="col-lg-6">
              <form class="navbar-form navbar-right">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-outline-primary"><span
                    class="glyphicon glyphicon-search"></button>
                </form>
              </div>
              <div class="col-lg-3 navbar-right">
                <ul class="nav navbar-nav">
                  <li><a href="homepage.html">TRANG CHỦ</a></li>
                  <li class="dropdown nav-item">
                    <a href="#note" class="nav-link dropdown-toggle"
                      data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">
                      ĐĂNG NHẬP
                    </a>
                    <ul class="dropdown-menu notifications">
                      <div class="container-fluid" id="login_container">
                        <div class="card card-container">
                          <img id="profile-img" class="profile-img-card"
                            src="../profile.png" />
                          <form class="form-signin" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                          <div class="form-group{{ $errors->has('email')||$errors->has('username') ? ' has-error' : '' }}">
                           

                           
                           
                            <span id="reauth-email" class="reauth-email"></span>
                            
                            
                            <input type="text" id="username"
                              class="form-control" placeholder="Username" name="username" value="{{ old('username') }}" required autofocus
                              >
                              @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif

                            <input type="password" id="inputPassword"
                              class="form-control" placeholder="Password" name="password"
                              required>

                              @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <button class="btn btn-lg btn-primary btn-block
                              btn-signin" type="submit">Đăng nhập</button>
                          <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                          </a>
                          </form><!-- /form -->
                        </div><!-- /card-container -->
                      </div><!-- /container -->
                    </ul>

                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </nav>