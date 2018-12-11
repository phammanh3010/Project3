@extends("layout.index")

@section("content")
<section class="container bg_container" style="margin-top: 80px;">
   
    <div id="main_text">
      <img src="img/register48x48.png" />&nbsp;{{$project->group_name}}
    </div>
    <div id="hr"></div>
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-10">
        <div>
          <div class="col-sm-3"><b>Học kỳ</b></div>
          <div class="col-sm-9">
            <p>{{$project->semester}}</p>
          </div>
        </div>
        <form>
          <div>
            <div class="col-sm-3"><b>Tên đề tài</b></div>
            <div class="col-sm-8">
              <p>{{$project->project_name}}</p>
            </div>
          </div>
        </form>
        <div>
          <div class="col-sm-3"><b>Giảng viên hướng dẫn</b></div>
          <div class="col-sm-9">
            <p>{{$project->full_name}}</p>
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
              <a class="btn btn-primary" href="teacher/project/{{$project->id_group}}/document">Tài liệu đồ án</a>
            </div>
            <div class="col-sm-3">
              <a class="list-group-item-success btn btn-default" href="teacher/project/{{$project->id_group}}/scheduel">Quản lí lịch trình</a>
            </div>
            <div class="col-sm-3">
              <a class="list-group-item-success btn btn-default" href="teacher/project/{{$project->id_group}}/evaluation">Đánh giá nhóm</a>
            </div>
            <div class="col-sm-3">
              <a class="list-group-item-success btn btn-default" href="teacher/project/{{$project->id_group}}/listStudent">Danh sách
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

                  

                    

                

                  <div id="message"></div>
                  <div class="row">
                    <div class="panel-body tab-content tab-pane">
                     
                      <div class="">
                        <h3 class="col-sm-12 text-center">Danh sách tài liệu báo cáo</h3>
                      </div>
                      @if(session('messenger'))
                      <div id="message_update" class="alert alert-danger">
                          {{session('messenger')}}
                      </div>
                      @endif
                  
                      <form action="" >
                        <table class="table" id="table_project">
                          <thead id="thead">
                            <tr>
                              <th scope="col" class="col-sm-1">STT</th>
                              <th scope="col" class="col-sm-3">Tài liệu</th>
                              <th scope="col" class="col-sm-2">Người upload</th>
                              <th scope="col" class="col-sm-2">Thời gian upload</th>
                              <th scope="col" class="col-sm-1">Loại</th>                              
                              <th scope="col" class="col-sm-1">Đánh giá</th>
                              <th scope="col" class="col-sm-1">Xác nhận</th>
                             
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i=0;?>
                          @foreach($studentDocuments as $studentDocument)
                             
                            <tr>
                               
                              <td scope="row">{{$i++}}</td>
                              <td><a href='teacher/project/{{$project->id_group}}/document/{{$studentDocument->id_document}}/download'>{{basename($studentDocument->path)}}</a></td>
                              <td>{{$studentDocument->full_name}}</td>
                              <td>{{$studentDocument->created_at}}</td>
                              <td>{{$studentDocument->type}}</td>
                             
                              <td scope="col" class="col-sm-1"><input id ='evaluate_{{$studentDocument->id_document}}' type="text"  class="form-control" value="{{$studentDocument->evaluate}}"></td>
                              <td scope="col" class="col-sm-"><a id='confirm_{{$studentDocument->id_document}}' type="button" class="btn btn-default" onclick="this.href='teacher/project/{{$project->id_group}}/document/{{$studentDocument->id_document}}/evaluate/'+document.getElementById('evaluate_{{$studentDocument->id_document}}').value">Xác nhận</a></td>
                             
                            </tr>
 
                            @endforeach                         
                            
                          </tbody>
                        </table>
                      </form>
                      <div>
                        <h3>
                          <i class="glyphicon glyphicon-forward" style="padding:10px 0;"></i> Tài liệu hướng dẫn
                        </h3>
                      </div>
                      <form method="post" id="upload_form" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group">
                      <table class="table">
                        <tr>
                        <td width="40%" align="left"><label>Chọn file tải lên</label></td>
                        <td width="30"><input type="file" name="file" id="file" /></td>
                        <td width="30%" align="left"> doc,docx,odt,pdf,pptx,xlsx,xls,csv,zip,rar</td>
                        </tr>
                        <tr>
                        <td width="40%" align="left">Loại tài liệu</td>
                        <td width="30">Tài liệu hướng dẫn</td>
                        <td width="30%" align="left">
                       <input class="btn btn-default" type="submit" name="upload" id="upload" class="btn btn-primary" value="Tải tài liệu lên">
                        </td>
                        </tr>
                      </table>
                      </div>
                    </form>
                      <div class="col-sm-12">
                        <h3 class="text-center">Danh sách tài liệu hướng dẫn</h3>
                      </div>
                      @if(count($errors) > 0)
                      <div class="alert alert-danger">
                          @foreach($errors->all() as $err)
                              {{$err}}<br>
                          @endforeach
                      </div>
                  @endif
                    
                  @if(session('thongbao'))
                  <div id="message_update" class="alert alert-success">
                      {{session('thongbao')}}
                  </div>
                  @endif
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
                        <?php $i=0;?>
                          @foreach($teacherDocuments as $teacherDocument)
                            <tr>
                              <td scope="row">{{$i++}}</td>
                              <td><a href='/teacher/project/{{$project->id_group}}/document/{{$teacherDocument->id_document}}/download'>{{basename($teacherDocument->path)}}</a></td>
                              <td>{{$teacherDocument->full_name}}</td>
                              <td>{{$teacherDocument->created_at}}</td>
                              <td class="text-center"><a type="button" class="btn btn-default" id="" onclick="return confirm('Bạn có muốn xóa?')" href='teacher/project/{{$project->id_group}}/document/{{$teacherDocument->id_document}}/delete' >Xóa</a></td>
                            </tr>
 
                            @endforeach
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
  <script>
      
@endsection
