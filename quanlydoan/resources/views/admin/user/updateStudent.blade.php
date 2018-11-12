@extends("admin.layout.index")

@section("content")
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                   <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa fa-bars"></i>Website hỗ trợ quản lí đồ án </h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="#">Trang chủ/Cập nhật thông tin sinh viên</a></li>
                        </ol>
                    </div>
                </div>  
                <div class="col-lg-12">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="">
                                    <div class="form-group ">
                                        <label class="control-label col-lg-2">Username</label>
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text"/>
                                        </div>
                                        <label class="control-label col-lg-2">Password</label>
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text"/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label col-lg-2">Họ tên</label>
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text"/>
                                        </div>
                                        <label class="control-label col-lg-2">Email</label>
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text"/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label col-lg-2">Lớp</label>
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text"/>
                                        </div>
                                        <label class="control-label col-lg-2">Số điện thoại</label>
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text"/>
                                        </div>
                                    </div>
                                    <div class="control-label col-lg-6">
                                        <div>
                                            <input class="btn btn-default" type="submit"  value ="Sửa" name="add" onclick="Confirm()">
                                        </div>
                                    </div>
                                </form>    
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
@endsection