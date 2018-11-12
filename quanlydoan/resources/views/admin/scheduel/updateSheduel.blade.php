@extends("admin.layout.index")

@section("content")
<section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa fa-bars"></i>Website hỗ trợ quản lí đồ án </h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="">Trang chủ/Cập nhật lịch trình đồ án/IT4421</a></li>
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
                                                    <button class="btn btn-default" name="add" onclick="">Cập nhật</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div> 
                                </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection