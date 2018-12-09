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
          @if(count($errors) > 0)
            <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{$err}}<br>
            @endforeach
            </div>
           @endif
            <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="teacher/project/createGroup">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
              <div class="form-group ">
                <label class="control-label col-sm-3">Học kỳ</label>
                <div class="col-sm-9">
                  <select class="form-control" name="semester">
                    <option value="20182">20182</option>
                    <option value="20181">20181</option>
                    <option value="20172">20172</option>
                    <option value="20171">20171</option>
                    <option value="20162">20162</option>
                    <option value="20161">20161</option>
                  </select>
                </div>
              </div>
              <div class="form-group ">
                <label class="control-label col-sm-3">Loại đồ án</label>
                <div class="col-sm-9">
                  <select class="form-control" name="subjectname">
                    <option value="IT4421">IT4421</option>
                    <option value="Khac">Khác</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Tên nhóm</label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" name="groupname"/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Tên đề tài</label>
                <div class="col-sm-9">
                  <textarea class="form-control" name="projectname"></textarea>
                </div>
              </div>
              <button class="btn btn-primary text-center" type="submit" value="add">Tạo Nhóm</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection