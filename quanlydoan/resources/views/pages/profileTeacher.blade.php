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
                  <input class="form-control" type="text" name="name" value="trandinhkhang@gmail.com" />
                </td>
              </tr>
              <tr>
                <td class="col-sm-2">
                  <p>Số điện thoại</p>
                </td>
                <td class="col-sm-8">
                  <input class="form-control" type="text" name="name" value="0123456789" />
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
    </div>
  </section>
@endsection