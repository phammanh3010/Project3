@extends("admin.layout.index")

@section("content")
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i>Website hỗ trợ quản lí đồ án </h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="">Trang chủ/Danh sách nhóm đồ án</a></li>
                </ol>
            </div>
        </div>  
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                </header>
                <div class="panel-body">
                    <div class="form">
                        <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="">
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Kì</label>
                                <div class="col-lg-3">
                                    <select class="form-control">
                                        <option>20182</option>  
                                        <option>20181</option> 
                                        <option>20171</option> 
                                        <option>20172</option> 
                                    </select>
                                </div>
                                <label class="control-label col-lg-2">Giảng viên</label>
                                <div class="col-lg-3">
                                    <input class="form-control" type="text"/>
                                </div>
                            </div>
                            <div class="control-label col-lg-6">
                                <div>
                                    <input class="btn btn-default" type="submit"  value ="Tìm kiếm" name="search">
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
            <section class="panel">
                <header class="panel-heading">
                    <a href="">Danh sách các nhóm đồ án</a>
                </header>

                <table class="table table-striped table-advance table-hover">
                    <tbody>
                        <tr>
                            <th class ="col-lg-1">ID nhóm</th>
                            <th class ="col-lg-1">Kì</th>
                            <th class ="col-lg-2">Giảng viên</th>
                            <th class ="col-lg-3">Đề tài</th>
                            <th class ="col-lg-2">Sinh viên</th>
                            <th class ="col-lg-2">Tài liệu</th>
                            <th>Xóa</th>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>20181</td>
                            <td>Trần Đình Khang</td>
                            <td>Web quản lí đồ án</td>
                            <td>
                                <p>Nguyễn Quốc Lâm</p>
                                <p>Pham Huy Hoàng</p>
                                <p>Hà Đình Khỏe</p>
                                <p>Phạm Công Mạnh</p>
                            </td>
                            <td>
                                <p>SRS</p>
                                <p>SDD</p>
                                <p>PROJECT PLAN</p>
                                <p>TEST CASE</p>
                            </td>
                            <td><button class="btn btn-default" onclick="">Xóa</button></td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>20181</td>
                            <td>Trần Đình Khang</td>
                            <td>Web quản lí đồ án</td>
                            <td>
                                <p>Nguyễn Quốc Lâm</p>
                                <p>Pham Huy Hoàng</p>
                                <p>Hà Đình Khỏe</p>
                                <p>Phạm Công Mạnh</p>
                            </td>
                            <td>
                                <p>SRS</p>
                                <p>SDD</p>
                                <p>PROJECT PLAN</p>
                                <p>TEST CASE</p>
                            </td>
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