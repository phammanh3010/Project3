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
                            <a class="btn btn-primary" href="scheduel.html">Quản lí lịch trình
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a class="list-group-item-success btn btn-default" href="evaluate.html">Đánh giá nhóm</a>
                        </div>
                        <div class="col-sm-3">
                            <a class="list-group-item-success btn btn-default" href="list_student.html">Danh sách
                                sinh viên</a>
                        </div>
                    </header>
                    <div class="panel-body">
                        <!--  lich trình thực hiện đồ án -->
                        <div class="tab-pane">
                            <section class="panel">
                                <div class="panel-body bio-graph-info">
                                    <div>
                                        <h3><i class="glyphicon glyphicon-forward" style="padding:10px 0;"></i> Kế
                                            hoạch thực hiện
                                            đồ án</h3>
                                    </div>
                                    <div class="row">
                                        <table class="table">
                                            <tr>
                                                <td class="col-sm-3"><b>Nhiệm vụ</b></td>
                                                <td class="col-sm-7"><b>Mô tả yêu cầu</b></td>
                                                <td class="col-sm-1"><b>Deadline</b></td>
                                                <td><b>Sửa</b></td>
                                                <td><b>Xóa</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>1. Đề xuất đề tài</p>
                                                </td>
                                                <td>
                                                    <p>Các nhóm xác định đề tài và thông qua sự
                                                        xác nhận của giáo viên hướng dẫn, tài liệu
                                                        yêu cầu:
                                                        báo cáo đề xuất đề tài
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>21/09/2018</p>
                                                </td>
                                                <td><button type="button" class="btn btn-default" id="update" value="">Sửa</button></td>
                                                <td><button type="button" class="btn btn-default" id="delete" value="">Xóa</button></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>2. Phân tích yêu cầu phần mềm</p>
                                                </td>
                                                <td>
                                                    <p>Các nhóm tiến hành phân tích yêu cầu phần
                                                        mềm, hoàn thành tài liệu phân tích yêu cầu
                                                        phần mềm</p>
                                                </td>
                                                <td>
                                                    <p>20/10/2018</p>
                                                </td>
                                                <td><button type="button" class="btn btn-default" id="update" value="">Sửa</button></td>
                                                <td><button type="button" class="btn btn-default" id="delete" value="">Xóa</button></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>3. Thiết kê hệ thống</p>
                                                </td>
                                                <td>
                                                    <p>Các nhóm tiến hành thiết kế hệ thống phần
                                                        mềm, hoàn thành tài liệu thiết kế phần mềm</p>
                                                </td>
                                                <td>
                                                    <p>20/10/2018</p>
                                                </td>
                                                <td><button type="button" class="btn btn-default" id="update" value="">Sửa</button></td>
                                                <td><button type="button" class="btn btn-default" id="delete" value="">Xóa</button></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>4. Kiểm thử hệ thống</p>
                                                </td>
                                                <td>
                                                    <p>Các nhóm tiến hành kiểm thử hệ thống phần
                                                        mềm, hoàn thành tài liệu kiểm thử phần mềm</p>
                                                </td>
                                                <td>
                                                    <p>20/11/2018</p>
                                                </td>
                                                <td><button type="button" class="btn btn-default" id="update" value="">Sửa</button></td>
                                                <td><button type="button" class="btn btn-default" id="delete" value="">Xóa</button></td>
                                            </tr>
                                        </table>
                                    </div <div class="row panel-body">
                                    <div>
                                        <h3><i class="glyphicon glyphicon-forward" style="padding:10px 0;"></i> Thêm
                                            nội dung kế hoạch</h3>
                                    </div>
                                    <div class="panel-body tab-content tab-pane">
                                        <div class="form">
                                            <form class="form-validate form-horizontal" id="feedback_form" method="POST"
                                                action="">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-10"></div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Yêu
                                                        cầu</label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" name="require"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Mô tả</label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" name="description"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Thời
                                                        hạn</label>
                                                    <div class="col-sm-3">
                                                        <input class="form-control" type="date" name="time"/>
                                                    </div>
                                                    <label class="control-label col-sm-4">Trừ</label>
                                                    <div class="col-sm-1">
                                                        <input class="form-control" name="penalty"/>
                                                    </div>
                                                </div>
                                                <div class="control-label col-sm-6
                                          text-center">
                                                    <button class="btn btn-default" name="add" onclick="">Thêm</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h3><i class="glyphicon glyphicon-forward" style="padding:10px 0;"></i> Kế
                                        hoạch thực hiện
                                        đồ án do bộ môn đưa ra</h3>
                                </div>
                                <div class="row">
                                    <table class="table">
                                        <tr>
                                            <td class="col-sm-3"><b>Nhiệm vụ</b></td>
                                            <td class="col-sm-7"><b>Mô tả yêu cầu</b></td>
                                            <td class="col-sm-1"><b>Deadline</b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>1. Đề xuất đề tài</p>
                                            </td>
                                            <td>
                                                <p>Các nhóm xác định đề tài và thông qua sự
                                                    xác nhận của giáo viên hướng dẫn, tài liệu
                                                    yêu cầu:
                                                    báo cáo đề xuất đề tài
                                                </p>
                                            </td>
                                            <td>
                                                <p>21/09/2018</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>2. Phân tích yêu cầu phần mềm</p>
                                            </td>
                                            <td>
                                                <p>Các nhóm tiến hành phân tích yêu cầu phần
                                                    mềm, hoàn thành tài liệu phân tích yêu cầu
                                                    phần mềm</p>
                                            </td>
                                            <td>
                                                <p>20/10/2018</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>3. Thiết kê hệ thống</p>
                                            </td>
                                            <td>
                                                <p>Các nhóm tiến hành thiết kế hệ thống phần
                                                    mềm, hoàn thành tài liệu thiết kế phần mềm</p>
                                            </td>
                                            <td>
                                                <p>20/10/2018</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>4. Kiểm thử hệ thống</p>
                                            </td>
                                            <td>
                                                <p>Các nhóm tiến hành kiểm thử hệ thống phần
                                                    mềm, hoàn thành tài liệu kiểm thử phần mềm</p>
                                            </td>
                                            <td>
                                                <p>20/11/2018</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<script>
        $("#add").click(function(event) {
 			$.ajax({
 			url: '../nhansu/add_ajax',
 			type: 'POST',
 			dataType: 'json',
 			data: {
 				ten: $("#ten").val(), // ten phai giong voi gia tri name o trong form
 				tuoi: $("#tuoi").val(),
 				anh:tenfile,
 				fb: $("#fb").val(),
 				sdt: $("#sdt").val()
 			},
 		})
 		.done(function() {
 			console.log("success");
 		})
 		.fail(function() {
 			console.log("error");
 		})
 		.always(function() {
 			console.log("complete");
 			noidung = "<div class='col-sm-4'>";
 			noidung += "<img class='card-img-top img-fluid' src='" + tenfile + "' alt='Card image cap'><div class='card-block'><h4 class='card-title'></h4>";
			noidung += "<p class='card-text'><b>Tên:</b>" + $('#ten').val() + "</p>";
			noidung += '<p class="card-text"><b>Tuổi:</b>' + $("#tuoi").val() + "</p>";
			noidung += '<p class="card-text"><b>Số điện thoại:</b>' + $("#sdt").val() + "</p>";
			noidung += '<p class="card-text"><a href="' + $("#fb").val() + '"' + "class='btn 			btn-xs btn-secondary'>FaceBook</a></p>";
			noidung += '<p class="card-text"><a href="sua_nhansu/<?= $list['id'] ?>" class="btn btn-xs btn-warning">Sửa</a></p>';
			noidung +=	'<p class="card-text"><a href="xoa_nhansu/<?= $list['id'] ?>" class="btn btn-xs btn-danger">Xóa<i class="fa fa-angle-right"></i></a></p>';
			noidung += "</div>";
			noidung += "</div>";

			$("#card").append(noidung);

			// reset về rỗng sau khi thêm xong
			$("#ten").val("");
 			$("#tuoi").val("");
 			$("#sdt").val("");
 			$("#facebook").val("");
 		});
 		});	
 	</script>
@endsection