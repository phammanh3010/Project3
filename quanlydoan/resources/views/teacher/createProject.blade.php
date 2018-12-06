@extends("layout.index")

@section("content")

<section class="container bg_container" style="margin-top: 80px;">
    <div id="main_text">
      <img src="img/register48x48.png" />&nbsp; Tạo nhóm đồ án mới
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
              <div class="form-group ">
                <label class="control-label col-sm-3">Loại đồ án</label>
                <div class="col-sm-9">
                  <select class="form-control" id="cname">
                    <option>IT4421</option>
                    <option>Khác</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Tên nhóm</label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Tên đề tài</label>
                <div class="col-sm-9">
                  <textarea class="form-control"></textarea>
                </div>
              </div>
              <button class="btn btn-primary text-center">Tạo Nhóm</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection