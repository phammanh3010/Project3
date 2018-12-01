@extends("admin.layout.index")

@section("content")
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa fa-bars"></i>Website hỗ trợ quản lí đồ án </h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="teacher.html">Trang chủ/Danh sách admin</a></li>
                            </ol>
                        </div>
                    </div>  
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div class="form">
                                    @if(count($errors) > 0)
                                        <div class="alert alert-danger">
                                            @foreach($errors->all() as $err)
                                                {{$err}}<br>
                                            @endforeach
                                        </div>
                                    @endif

                                    @if(session('thongbao'))
                                        <div class="alert alert-success">
                                            {{session('thongbao')}}
                                        </div>
                                    @endif

                                    <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="admin/user/addOrSearch">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <div class="form-group ">
                                            <label class="control-label col-lg-2">Username</label>
                                            <div class="col-lg-3">
                                                <input class="form-control" type="text" name="username" />
                                            </div>
                                            <label class="control-label col-lg-2">Password</label>
                                            <div class="col-lg-3">
                                                <input class="form-control" type="text" name="password" />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label col-lg-2">Họ tên</label>
                                            <div class="col-lg-3">
                                                <input class="form-control" type="text" name="full_name" />
                                            </div>
                                            <label class="control-label col-lg-2">Email</label>
                                            <div class="col-lg-3">
                                                <input class="form-control" type="text" name="email" />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label col-lg-2">Số điện thoại</label>
                                            <div class="col-lg-3">
                                                <input class="form-control" type="text" name="phone" />
                                            </div>
                                        </div>
                                        <div class="control-label col-lg-6">
                                            <div>
                                                <button class="btn btn-default" type="submit" name="action" value="add">Thêm</button>
                                            </div>
                                        </div>
                                    </form>    
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form ">
                            <form class="form-inline">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
                            </form>
                        </div>
                        <section class="panel">
                            <header class="panel-heading">
                                Danh sách người dùng Admin
                            </header>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class ="col-lg-3">Username</th>
                                            <th class ="col-lg-3">Họ tên</th>
                                            <th class ="col-lg-2">Email</th>
                                            <th class ="col-lg-2">Số điện thoại</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($admin as $ad)
                                            <tr>
                                                <td>{{$ad->username}}</td>
                                                <td>{{$ad->full_name}}</td>
                                                <td>{{$ad->email}}</td>
                                                <td>{{$ad->phone}}</td>
                                                <td><button class="btn btn-default" name="add" onclick="location.href='admin/user/updateAdmin/{{$ad->username}}'">Sửa</button></td>
                                                <td><button class="btn btn-default" name="delete" onclick="location.href='admin/user/deleteAdmin/{{$ad->username}}'">Xóa</button></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </section>
                    </div>
                </div>
            </section>
        </section>
@endsection