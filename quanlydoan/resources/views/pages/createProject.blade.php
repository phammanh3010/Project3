@extends("layout.index")

@section("content")

<section class="container bg_container" style="margin-top: 80px;">
    <div id="main_text">
      <img src="img/register48x48.png" />&nbsp; Project 3
    </div>
    <div id="hr">
    </div>
    <div class="text-center">
      <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
          <div class="form">
            <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="">
              <div class="form-group ">
                <label class="control-label col-sm-3">Học kỳ</label>
                <div class="col-sm-9">
                  <select class="form-control" id="cname">
                    <option>20182</option>
                    <option>20181</option>
                    <option>20172</option>
                    <option>20171</option>
                    <option>20162</option>
                    <option>20161</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Tên nhóm</label>
                <div class="col-sm-9">
                  <input class="form-control" name="id" type="text" />
                </div>
              </div>
              <div class="form-group ">
                <label class="control-label col-sm-3">Thành viên</label>
                <div class="col-sm-9">
                  <input class="form-control " type="text" name="name" />
                </div>
              </div>
              <div class="control-label col-sm-7">
                <div>
                  <input class="btn btn-default" type="submit" value="Thêm" name="add" onclick="Confirm()">
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-sm-3">
        </div>
      </div>
    </div>
    <div class="title_project">
      <h3 class="text-center">Danh sách thành viên</h3>
    </div>
    <table class="table" id="table_project">
      <thead id="thead">
        <tr>
          <th scope="col">STT</th>
          <th scope="col">MSSV</th>
          <th scope="col">HỌ TÊN</th>
          <th scope="col">LỚP</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td scope="row">1</td>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <td scope="row">1</td>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
      </tbody>
    </table>
    <div class="text-center">
      <form>
        <buton class="btn btn-primary text-center">Tạo Nhóm</buton>
      </form>
    </div>
  </section>
@endsection