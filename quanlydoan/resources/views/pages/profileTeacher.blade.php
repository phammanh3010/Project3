@extends("layout.index")

@section("content")

<section class="container bg_container" style="margin-top: 80px;">
        <div id="main_text">
          <img src="../register48x48.png" />&nbsp;GIẢNG VIÊN
        </div>
        <div id="hr">
        </div>
        <div class="">
          <h3 class="text-center">Trần Đình Khang</h3>
          <form action="">
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-8">
                <table class="table">
                  <tr>
                    <td class="col-sm-2">
                      <p>Họ tên</p>
                    </td>
                    <td class="col-sm-8">
                      <p>Tràn Đình Khang</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="col-sm-2">
                      <p>Nơi làm việc</p>
                    </td>
                    <td class="col-sm-8">
                      <p>B1-702</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="col-sm-2">
                      <p>Email</p>
                    </td>
                    <td class="col-sm-8">
                      <input class="form-control" type="text" name="name"
                        value="trandinhkhang@gmail.com" />
                    </td>
                  </tr>
                  <tr>
                    <td class="col-sm-2">
                      <p>Số điện thoại</p>
                    </td>
                    <td class="col-sm-8">
                      <input class="form-control" type="text" name="name"
                        value="0123456789" />
                    </td>
                  </tr>
                  <tr>
                    <td class="col-sm-2">
                      <p>Danh sách đồ án đang hướng dẫn</p>
                    </td>
                    <td class="col-sm-8">
                      <p><a href="#">Nhóm 1: Web quản lí đồ án</a></p>
                      <p><a href="#">Nhóm 1: Web quản lí đồ án</a></p>
                      <p><a href="#">Nhóm 1: Web quản lí đồ án</a></p>
                      <p><a href="#">Nhóm 1: Web quản lí đồ án</a></p>
                      <p><a href="#">Nhóm 1: Web quản lí đồ án</a></p>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="text-center">
              <button class="btn btn-primary text-center">Chỉnh sửa</button>
            </div>
          </form>
          <div>
            <div class="text-center"><h2>Đổi mật khẩu</h2></div>
            <div class="row">
              <div class="col-sm-3">
              </div>
              <div class="col-sm-6">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form"
                    method="POST" action="">
                    <div class="form-group">
                      <label class="control-label col-sm-3">Mật khẩu cũ</label>
                      <div class="col-sm-9">
                        <input class="form-control" name="" type="text" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3">Mật khẩu mới</label>
                      <div class="col-sm-9">
                        <input class="form-control" type="text" name="" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3">Mật khẩu mới</label>
                      <div class="col-sm-9">
                        <input class="form-control" type="text" name="" />
                      </div>
                    </div>
                    <div class="control-label col-sm-7">
                      <div>
                        <input class="btn btn-default" type="submit" value="Đổi
                          mật khẩu" name="add" onclick="Confirm()">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-sm-3">
              </div>
            </div>
          </div>
        </section>
@endsection