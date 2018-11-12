@extends("layout.index")

@section("content")
<section class="container bg_container" style="margin-top: 80px;">
        <div id="main_text">
            <img src="../register48x48.png" />&nbsp; Nhóm project 3
        </div>
        <div id="hr"></div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div>
                    <div class="col-sm-3"><b>Học kỳ</b></div>
                    <div class="col-sm-9">
                        <p>20181</p>
                    </div>
                </div>
                <form>
                    <div>
                        <div class="col-sm-3"><b>Tên đề tài</b></div>
                        <div class="col-sm-8">
                            <p>Web quản lí đồ án</p>
                        </div>
                    </div>
                </form>
                <div>
                    <div class="col-sm-3"><b>Giảng viên hướng dẫn</b></div>
                    <div class="col-sm-9">
                        <p>PGS.TS Trần Đình Khang</p>
                    </div>
                </div>
                <div id="hr1"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading text-center">
                        <div class="col-sm-3">
                            <a class="list-group-item-success btn btn-default" href="document.html">Tài liệu đồ án</a>
                        </div>
                        <div class="col-sm-3">
                            <a class="list-group-item-success btn btn-default" href="scheduel.html">Quản lí lịch trình</a>
                        </div>
                        <div class="col-sm-3">
                            <a class="list-group-item-success btn btn-default" href="evaluate.html">Đánh giá nhóm</a>
                        </div>
                        <div class="col-sm-3">
                            <a class="btn btn-primary" href="list_student.html">Danh sách
                                sinh viên</a>
                        </div>
                    </header>
                    <div class="panel-body">
                        <div class="tab-pane">
                            <!-- danh sách sinh viên -->
                            <div id="list_student" class="tab-pane">
                                <section class="panel">
                                    <div class="panel-body bio-graph-info">
                                        <div>
                                            <h3><i class="glyphicon glyphicon-forward" style="padding:10px 0;"></i>Danh
                                                sách sinh viên</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="title_project">
                                            <h3 class="text-center">Danh sách thành viên</h3>
                                        </div>
                                        <table class="table" id="table_project">
                                            <thead id="thead">
                                                <tr>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">MSSV</th>
                                                    <th scope="col">Họ tên</th>
                                                    <th scope="col">Lớp</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Số điện thoại</th>
                                                    <th scope="col">Xóa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">1</td>
                                                    <td>20152128</td>
                                                    <td>Nguyễn Quốc Lâm</td>
                                                    <td>CNTT2-4</td>
                                                    <td>nguyenquoclambk@gmail.com</td>
                                                    <td>0123456789</td>
                                                    <td class="text-center"><button type="button" class="btn
                                      btn-default"
                                                            id="xuli" value="">Xóa</button></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">1</td>
                                                    <td>20152128</td>
                                                    <td>Nguyễn Quốc Lâm</td>
                                                    <td>CNTT2-4</td>
                                                    <td>nguyenquoclambk@gmail.com</td>
                                                    <td>0123456789</td>
                                                    <td class="text-center"><button type="button" class="btn
                                      btn-default"
                                                            id="xuli" value="">Xóa</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row panel-body">
                                        <div class="panel-body bio-graph-info">
                                            <h3><i class="glyphicon glyphicon-forward" style="padding:10px 0;"></i>Thêm sinh viên</h3>
                                        </div>
                                        <div class="form">
                                            <form class="form-validate form-horizontal" method="POST" action="">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Thanh viên</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="control-label col-sm-6
                                    text-center">
                                                    <button class="btn btn-default" name="add" onclick="">Thêm</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection