@extends("admin.layout.index")

@section("content")
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa fa-bars"></i>Website hỗ trợ quản lí đồ án </h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="teacher.html">Trang chủ/Danh sách giảng viên</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div class="form">
                                    <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="">
                                        <div class="form-group ">
                                            <label class="control-label col-lg-2">Username</label>
                                            <div class="col-lg-3">
                                                <input class="form-control" type="text" />
                                            </div>
                                            <label class="control-label col-lg-2">Password</label>
                                            <div class="col-lg-3">
                                                <input class="form-control" type="text" />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label col-lg-2">Họ tên</label>
                                            <div class="col-lg-3">
                                                <input class="form-control" type="text" />
                                            </div>
                                            <label class="control-label col-lg-2">Email</label>
                                            <div class="col-lg-3">
                                                <input class="form-control" type="text" />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label col-lg-2">Phòng làm việc</label>
                                            <div class="col-lg-3">
                                                <input class="form-control" type="text" />
                                            </div>
                                            <label class="control-label col-lg-2">Số điện thoại</label>
                                            <div class="col-lg-3">
                                                <input class="form-control" type="text" />
                                            </div>
                                        </div>
                                        <div class="control-label col-lg-6">
                                            <div>
                                                <input class="btn btn-default" type="submit" value="Thêm" name="add"
                                                    onclick="Confirm()">
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
                        <div class="form">
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
                                Danh sách người dùng Giảng Viên
                            </header>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class ="col-lg-1">ID</th>
                                            <th class ="col-lg-2">Username</th>
                                            <th class ="col-lg-2">Họ tên</th>
                                            <th class ="col-lg-2">Email</th>
                                            <th class ="col-lg-2">Số điện thoại</th>
                                            <th class ="col-lg-2">Phòng làm việc</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($teacher as $tc)
                                            <tr>
                                                <td>{{$tc->id_teacher}}</td>
                                                <td>{{$tc->username}}</td>
                                                <td>{{$tc->full_name}}</td>
                                                <td>{{$tc->email}}</td>
                                                <td>{{$tc->phone}}</td>
                                                <td>{{$tc->workplace}}</td>
                                                <td><button class="btn btn-default" name="add" onclick="">Sửa</button></td>
                                                <td><button class="btn btn-default" name="add" onclick="">Xóa</button></td>
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