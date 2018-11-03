@extends("layout.index")

@section("content")

<section class="container bg_container" style="margin-top: 80px;">
        <div id="main_text">
          <img src="img/register48x48.png" />&nbsp; Project 3
        </div>
        <div id="hr"></div>
        <div class="">
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
              <div>
                <div class="col-sm-3"><b>Học kỳ</b></div>
                <div class="col-sm-9">
                  <p>20181</p>
                </div>
              </div>
              <div>
                <div class="col-sm-3"><b>Tên đề tài</b></div>
                <div class="col-sm-9">
                  <p>Website quản lí đồ án</p>
                </div>
              </div>
              <div>
                <div class="col-sm-3"><b>Giảng viên hướng dẫn</b></div>
                <div class="col-sm-9">
                  <a hreaf="">PGS.TS Trần Đình Khang</a>
                </div>
              </div>
              <div id="hr1"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading tab-bg-info">
                  <div class="col-sm-3">
                    <a class="list-group-item-success btn btn-default"
                      data-toggle="tab" href="#document">Tài
                      liệu đồ án</a>
                  </div>
                  <div class="col-sm-3">
                    <a class="list-group-item-success btn btn-default"
                      data-toggle="tab" href="#create_scheduel">Kế
                      hoạch thực hiện</a>
                  </div>
                  <div class="col-sm-3">
                    <a class="list-group-item-success btn btn-default"
                      data-toggle="tab" href="#tieuchi">Tiêu
                      chí đánh giá</a>
                  </div>
                  <div class="col-sm-3">
                    <a class="list-group-item-success btn btn-default"
                      data-toggle="tab" href="#list_student">Danh
                      sách sinh viên</a>
                  </div>
                </header>
                <div class="panel-body">
                  <div class="tab-content">
                    <!-- profile -->
                    <div id="document" class="tab-pane">
                      <section class="panel">
                        <div class="panel-body bio-graph-info">
                          <div>
                            <h4>
                              <i class="glyphicon glyphicon-forward"style="padding:20px 0;"></i> Tài liệu yêu cầu
                            </h4>
                          </div>
                          <div class="row">
                            <div class="panel-body tab-content tab-pane">
                              <div class="form-group">
                                <label class="control-label col-sm-3">Upload</label>
                                <div class="col-sm-4">
                                  <input type="file">
                                </div>
                                <div class="col-sm-3">
                                  <input class="btn btn-default" type="button"
                                    value="Tải tài liệu lên" name="add"
                                    onclick="">
                                </div>
                              </div>
                              <div class="">
                                <h3 class="col-sm-12 text-center">Danh sách tài
                                  liệu báo cáo</h3>
                              </div>
                              <table class="table" id="table_project">
                                <thead id="thead">
                                  <tr>
                                    <th scope="col" class="col-sm-1">STT</th>
                                    <th scope="col" class="col-sm-4">Tài liệu</th>
                                    <th scope="col" class="col-sm-4">Người upload</th>
                                    <th scope="col" class="col-sm-2">Thời gian upload</th>
                                    <th scope="col" class="col-sm-2">Xóa</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td scope="row">1</td>
                                    <td><a href='#'>SRS</a></td>
                                    <td>Nguyễn Quốc Lâm</td>
                                    <td>21/10/2018</td>
                                    <td><button type="button" class="btn btn-default" id ="xuli" value="">Xóa</button></td>
                                  </tr>
                                  <tr>
                                    <td scope="row">1</td>
                                    <td><a href='#'>SRS</a></td>
                                    <td>Nguyễn Quốc Lâm</td>
                                    <td>21/10/2018</td>
                                    <td><button type="button" class="btn btn-default" id ="xuli" value="">Xóa</button></td>
                                  </tr>
                                </tbody>
                              </table>
                              <div>
                                  <h4>
                                    <i class="glyphicon glyphicon-forward"style="padding:20px 0;"></i> Tài liệu hướng dẫn
                                  </h4>
                                </div>
                              <div class="form-group">
                                <label class="control-label col-sm-3">Upload</label>
                                <div class="col-sm-4">
                                  <input type="file">
                                </div>
                                <div class="col-sm-3">
                                  <input class="btn btn-default" type="button"
                                    value="Tải tài liệu lên" name="add"
                                    onclick="">
                                </div>
                              </div>
                              <div class="col-sm-12">
                                <h3 class="text-center">Danh sách tài liệu hướng
                                  dẫn</h3>
                              </div>
                              <table class="table" id="table_project">
                                <thead id="thead">
                                  <tr>
                                    <th scope="col" class="col-sm-1">STT</th>
                                    <th scope="col" class="col-sm-4">Tài liệu</th>
                                    <th scope="col" class="col-sm-4">Người upload</th>
                                    <th scope="col" class="col-sm-2">Thời gian upload</th>
                                    <th scope="col" class="col-sm-1">Xóa</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td scope="row">1</td>
                                    <td><a href='#'>SRS</a></td>
                                    <td>Nguyễn Quốc Lâm</td>
                                    <td>21/10/2018</td>
                                    <td><button type="button" class="btn btn-default" id ="xuli" value="">Xóa</button></td>
                                  </tr>
                                  <tr>
                                    <td scope="row">1</td>
                                    <td><a href='#'>SRS</a></td>
                                    <td>Nguyễn Quốc Lâm</td>
                                    <td>21/10/2018</td>
                                    <td><button type="button" class="btn btn-default" id ="xuli" value="">Xóa</button></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </section>
                    </div>

                    <!--  lich trình thực hiện đồ án -->
                    <div id="create_scheduel" class="tab-pane">
                      <section class="panel">
                        <div class="panel-body bio-graph-info">
                          <div>
                            <h4><i class="glyphicon glyphicon-forward"
                                style="padding:20px 0;"></i> Kế hoạch thực hiện
                              đồ án</h4>
                          </div>
                          <div class="row">
                            <table class="table">
                              <tr>
                                <td class="col-sm-3"><b>Nhiệm vụ</b></td>
                                <td class="col-sm-7"><b>Mô tả yêu cầu</b></td>
                                <td class="col-sm-1"><b>Deadline</b></td>
                                <td>Xóa</td>
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
                                <td><button type="button" class="btn btn-default" id ="xuli" value="">Xóa</button></td>
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
                                <td><button type="button" class="btn btn-default" id ="xuli" value="">Xóa</button></td>
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
                                <td><button type="button" class="btn btn-default" id ="xuli" value="">Xóa</button></td>
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
                                <td><button type="button" class="btn btn-default" id ="xuli" value="">Xóa</button></td>
                              </tr>
                            </table>
                          </div>
                          <div class="row">
                            <div class="panel-body tab-content tab-pane">
                              <div class="form">
                                <form class="form-validate form-horizontal"
                                  id="feedback_form" method="POST" action="">
                                  <div class="form-group">
                                    <label class="control-label col-sm-1">Yêu cầu</label>
                                    <div class="col-sm-1">
                                      <input type="text" class="form-control" />
                                    </div>
                                    <label class="control-label col-sm-1">Mô tả</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" />
                                    </div>
                                    <label class="control-label col-sm-1">Thời hạn</label>
                                    <div class="col-sm-2">
                                      <input class="form-control" type="date" />
                                    </div>
                                    <label class="control-label col-sm-1">Trừ</label>
                                    <div class="col-sm-1">
                                      <input class="form-control" />
                                    </div>
                                  </div>
                                  <div class="control-label col-sm-6
                                    text-center">
                                    <button class="btn btn-default" name="add"
                                      onclick="">Thêm</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <div>
                              <h4><i class="glyphicon glyphicon-forward"
                                  style="padding:20px 0;"></i> Kế hoạch thực hiện
                                đồ án do bộ môn đưa ra</h4>
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

                    <!-- Tieu chí đánh giá -->
                    <div id="tieuchi" class="tab-pane">
                      <section class="panel">
                        <div class="panel-body bio-graph-info">
                          <div>
                            <h4><i class="glyphicon glyphicon-forward"
                                style="padding:20px 0;"></i> Tiêu chí đánh giá đồ án</h4>
                          </div>
                          <div class="row">
                            <table class="table">
                              <tr>
                                <td class="col-sm-9"><b>Tiêu chí</b></td>
                                <td class="col-sm-2"><b>Điểm cộng/trừ</b></td>
                                <td class="col-sm-1"><b>Xóa</b></td>
                              </tr>
                              <tr>
                                <td>
                                  <p>Các nhóm xác định đề tài và thông qua sự
                                    xác nhận của giáo viên hướng dẫn, tài liệu
                                    yêu cầu:
                                    báo cáo đề xuất đề tài
                                  </p>
                                </td>
                                <td>
                                  <p>0.5</p>
                                </td>
                                <td><button type="button" class="btn btn-default" id ="xuli" value="">Xóa</button></td>
                              </tr>
                              <tr>
                                <td>
                                  <p>Các nhóm tiến hành phân tích yêu cầu phần
                                    mềm, hoàn thành tài liệu phân tích yêu cầu
                                    phần mềm</p>
                                </td>
                                <td>
                                  <p>0.5</p>
                                </td>
                                <td><button type="button" class="btn btn-default" id ="xuli" value="">Xóa</button></td>
                              </tr>
                              <tr>
                                <td>
                                  <p>Các nhóm tiến hành thiết kế hệ thống phần
                                    mềm, hoàn thành tài liệu thiết kế phần mềm</p>
                                </td>
                                <td>
                                  <p>0.25</p>
                                </td>
                                <td><button type="button" class="btn btn-default" id ="xuli" value="">Xóa</button></td>
                              </tr>
                              <tr>
                                <td>
                                  <p>Các nhóm tiến hành kiểm thử hệ thống phần
                                    mềm, hoàn thành tài liệu kiểm thử phần mềm</p>
                                </td>
                                <td>
                                  <p>0.25</p>
                                </td>
                                <td><button type="button" class="btn btn-default" id ="xuli" value="">Xóa</button></td>
                              </tr>
                            </table>
                          </div>
                          <div class="row">
                            <div class="panel-body tab-content tab-pane">
                              <div class="form">
                                <form class="form-validate form-horizontal"
                                  id="feedback_form" method="POST" action="">
                                  <div class="form-group">
                                    <label class="control-label col-sm-1">Tiêu
                                      chí</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" />
                                    </div>
                                    <label class="control-label col-sm-4">Điểm
                                      cộng/trừ</label>
                                    <div class="col-sm-1">
                                      <input class="form-control" />
                                    </div>
                                  </div>
                                  <div class="control-label col-sm-6
                                    text-center">
                                    <button class="btn btn-default" name="add"
                                      onclick="">Thêm</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                    </div>

                    <!-- danh sách sinh viên -->
                    <div id="list_student" class="tab-pane">
                      <section class="panel">
                        <div class="panel-body bio-graph-info">
                          <div class="row">
                            <div class="panel-body tab-content tab-pane">
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
                                    <td><button type="button" class="btn btn-default" id ="xuli" value="">Xóa</button></td>
                                  </tr>
                                  <tr>
                                    <td scope="row">1</td>
                                    <td>20152128</td>
                                    <td>Nguyễn Quốc Lâm</td>
                                    <td>CNTT2-4</td>
                                    <td>nguyenquoclambk@gmail.com</td>
                                    <td>0123456789</td>
                                    <td><button type="button" class="btn btn-default" id ="xuli" value="">Xóa</button></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </section>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </section>
@endsection