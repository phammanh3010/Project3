@extends("layout.index")

@section("content")
<section class="container bg_container" style="margin-top: 80px;">
        <div id="main_text">
            <img src="img/register48x48.png" />&nbsp; Nhóm project 3
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
                            <a class="btn btn-primary" href="evaluate.html">Đánh giá nhóm</a>
                        </div>
                        <div class="col-sm-3">
                            <a class="list-group-item-success btn btn-default" href="list_student.html">Danh sách sinh viên</a>
                        </div>
                    </header>
                    <div class="panel-body">
                        <!-- Tieu chí đánh giá -->
                        <div class="tab-pane">
                            <section class="panel">
                                <div class="panel-body bio-graph-info">
                                    <div class="row panel-body" id="update_evaluate">
                                            <div>
                                                <h3><i class="glyphicon glyphicon-forward" style="padding:10px 0;"></i> Chỉnh sửa tiêu chí</h3>
                                            </div>
                                            <div class="panel-body tab-content tab-pane">
                                                <div class="form">
                                                    <form class="form-validate form-horizontal" id="feedback_form" method="POST"
                                                        action="">
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-1">Tiêu chí</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" />
                                                            </div>
                                                            <label class="control-label col-sm-4">Điểm cộng/trừ</label>
                                                            <div class="col-sm-1">
                                                                <input class="form-control"/>
                                                            </div>
                                                        </div>
                                                        <div class="control-label col-sm-6 text-center">
                                                            <button class="btn btn-default" name="add" onclick="">Cập nhật</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="panel-body tab-content tab-pane">
                                            <h3><i class="glyphicon glyphicon-forward" style="padding:10px 0;"></i> Đánh giá tổng thể nhóm</h3> 
                                            <h4 class="text-center">Điểm hiện tại: 5.6</h4>
                                            <h4 class="text-center">Điểm cuối cùng 8.5</h4>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection