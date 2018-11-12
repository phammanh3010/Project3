@extends("admin.layout.index")

@section("content")
<section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa fa-bars"></i>Website hỗ trợ quản lí đồ án </h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="">Trang chủ/Lịch trình đồ án/IT4421</a></li>
                        </ol>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-lg-12">
                        <div id="create_scheduel" class="tab-pane">
                            <section class="panel">
                                <div class="panel-body bio-graph-info">
                                    <div class="row">
                                            <div class="form">
                                                <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="">
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-3">Nhiệm vụ</label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control"></textarea> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-3">Mô tả yêu cầu</label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control"></textarea> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-sm-3">Deadline</label>
                                                            <div class="col-sm-3">
                                                             <input class="form-control" type="date"/>
                                                         </div>
                                                         <label  class="control-label col-sm-1">Trừ</label>
                                                         <div class="col-sm-1">
                                                            <input class="form-control"/>
                                                        </div>
                                                </div>
                                                <div class="control-label col-sm-6 text-center">
                                                    <button class="btn btn-default" name="add" onclick="">Thêm</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div> 
                                </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <a href="">Danh sách các nội dung thực hiện</a>
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                                <tr>
                                    <th class ="col-lg-2">Nhiệm vụ</th>
                                    <th class ="col-lg-5">Mô tả yêu cầu</th>
                                    <th class ="col-lg-2">Thời hạn</th>
                                    <th class ="col-lg-2">Điểm trừ deadline</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                <tr>
                                    <td>SRS</td>
                                    <td>Phân tích thiết kề hệ thông, tài liệu phân tích yêu cầu</td>
                                    <td>20-10-2018</td>
                                    <td>0.5</td>
                                    <td><button class="btn btn-default" onclick="">Sửa</button></td>
                                    <td><button class="btn btn-default" onclick="">Xóa</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </section>
    </section>
@endsection