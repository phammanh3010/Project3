@extends("layout.index")

@section("content")
<section class="container bg_container" style="margin-top: 80px;">
    <div id="main_text">
      <img src="../register48x48.png" />&nbsp; Project 3
    </div>
    <div id="hr">
    </div>
    <form>
      <lable>Học kỳ</lable>
      <select>
        <option>20182</option>
        <option>20181</option>
        <option>20172</option>
        <option>20171</option>
        <option>20162</option>
        <option>20161</option>
      </select>
    </form>
    <div class="title_project">
      <h3 class="text-center">Danh sách đồ án</h3>
    </div>
    <table class="table" id="table_project">
      <thead id="thead">
        <tr>
          <th scope="col" class="col-sm-1">STT</th>
          <th scope="col" class="col-sm-3">Giảng viên</th>
          <th scope="col" class="col-sm-4">Đề tài</th>
          <th scope="col" class="col-sm-2">Đã hoàn thành</th>
          <th scope="col" class="col-sm-1">Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td scope="row">1</td>
          <td>Trần Đình Khang</td>
          <td>Web quản lí đồ án</td>
          <td>Đã hoàn thành</td>
          <td><a href="project_detail.html" class="btn btn-primary text-center">Chi tiết</a></td>
        </tr>
        <tr>
          <td scope="row">1</td>
          <td>Trần Đình Khang</td>
          <td>Web quản lí đồ án</td>
          <td>Đã hoàn thành</td>
          <td><a href="project_detail.html" class="btn btn-primary text-center">Chi tiết</a></td>
        </tr>
        <tr>
          <td scope="row">1</td>
          <td>Trần Đình Khang</td>
          <td>Web quản lí đồ án</td>
          <td>Đã hoàn thành</td>
          <td><a href="project_detail.html" class="btn btn-primary text-center">Chi tiết</a></td>
        </tr>
      </tbody>
    </table>
    <div class="text-center">
      <a href="create_project.html" class="btn btn-primary text-center">Tạo Mới</a>
    </div>
  </section>
@endsection