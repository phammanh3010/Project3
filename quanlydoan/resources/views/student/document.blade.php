@extends("layout.index")

@section("content")
<section class="container bg_container" style="margin-top: 80px;">
    @foreach($documents as $document)
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
              <a class="btn btn-primary" href="document.html">Tài liệu đồ án</a>
            </div>
            <div class="col-sm-3">
              <a class="list-group-item-success btn btn-default" href="scheduel.html">Quản lí lịch trình</a>
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
            <div class="tab-pane">
              <section class="panel">
                <div class="panel-body bio-graph-info">
                  <div>
                    <h3>
                      <i class="glyphicon glyphicon-forward" style="padding:10px 0;"></i> Tài
                      liệu yêu cầu
                    </h3>
                  </div>
                  <div class="row">
                    <div class="panel-body tab-content tab-pane">
                      <div class="form-group">
                        <label class="control-label col-sm-3">Upload</label>
                        <div class="col-sm-4">
                          <input type="file">
                        </div>
                        <div class="col-sm-3">
                          <input class="btn btn-default" type="button" value="Tải tài liệu lên" name="add" onclick="">
                        </div>
                      </div>
                      <div class="">
                        <h3 class="col-sm-12 text-center">Danh sách tài liệu báo cáo</h3>
                      </div>
                      <form action="">
                        <table class="table" id="table_project">
                          <thead id="thead">
                            <tr>
                              <th scope="col" class="col-sm-1">STT</th>
                              <th scope="col" class="col-sm-3">Tài liệu</th>
                              <th scope="col" class="col-sm-2">Người upload</th>
                              <th scope="col" class="col-sm-2">Thời gian upload</th>
                              <th scope="col" class="col-sm-1">Điểm</th>
                              <th scope="col" class="col-sm-1">Đánh giá</th>
                              <th scope="col" class="col-sm-1">Xác nhận</th>
                              <th scope="col" class="col-sm-1">Xóa</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td scope="row">1</td>
                              <td><a href='#'>SRS</a></td>
                              <td>Nguyễn Quốc Lâm</td>
                              <td>21/10/2018</td>
                              <td class="text-center">9</td>
                              <td scope="col" class="col-sm-1"><input type="text"  class="form-control" value="9"></td>
                              <td scope="col" class="col-sm-"><button type="button" class="btn btn-default">Xác nhận</button></td>
                              <td class="text-center"><button type="button" class="btn btn-default" id="xuli" value="">Xóa</button></td>
                            </tr>
                            <tr>
                              <td scope="row">1</td>
                              <td><a href='#'>SRS</a></td>
                              <td>Nguyễn Quốc Lâm</td>
                              <td>21/10/2018</td>
                              <td class="text-center">9</td>
                              <td scope="col" class="col-sm-1"><input type="text"  class="form-control" value="9"></td>
                              <td scope="col" class="col-sm-"><button type="button" class="btn btn-default">Xác nhận</button></td>
                              <td class="text-center"><button type="button" class="btn btn-default" id="xuli" value="">Xóa</button></td>
                            </tr>
                          </tbody>
                        </table>
                      </form>
                      <div>
                        <h3>
                          <i class="glyphicon glyphicon-forward" style="padding:10px 0;"></i> Tài liệu hướng dẫn
                        </h3>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-3">Upload</label>
                        <div class="col-sm-4">
                          <input type="file">
                        </div>
                        <div class="col-sm-3">
                          <input class="btn btn-default" type="button" value="Tải tài liệu lên" name="add" onclick="">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <h3 class="text-center">Danh sách tài liệu hướng dẫn</h3>
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
                            <td class="text-center"><button type="button" class="btn btn-default"id="xuli" value="">Xóa</button></td>
                          </tr>
                          <tr>
                            <td scope="row">1</td>
                            <td><a href='#'>SRS</a></td>
                            <td>Nguyễn Quốc Lâm</td>
                            <td>21/10/2018</td>
                            <td class="text-center"><button type="button" class="btn btn-default" id="xuli" value="">Xóa</button></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </section>
            </div>
        </section>
      </div>
    </div>
  </section>
@endsection