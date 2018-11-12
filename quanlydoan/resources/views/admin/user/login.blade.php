@extends("admin.layout.login")
@section("content")
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                        </div>
                    </div>
                </section>    
            </section>
            <!-- start form login-->
            <section>
                <div>
                    <form class="login-form" action="" method="POST" >
                        <div class="login-wrap">
                            <p class="login-img"><i class="icon_lock_alt"></i></p>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon_profile"></i></span>
                                <input type="text" class="form-control"  name="id" id="username" >
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                                <input type="password" class="form-control"  name="password" id="password">
                            </div>
                            <label class="checkbox">
                                <input type="checkbox" value="remember-me"> Remember me
                                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
                            </label>
                            <button class="btn btn-primary btn-lg btn-block" type="submit" name ="submit" onclick="ValidateForm()">Login</button>
                        </div>
                    </form>
                    <div class="text-right">
                        <div class="credits">     
                        </div>
                    </div>
                </div>
            </section>
@endsection