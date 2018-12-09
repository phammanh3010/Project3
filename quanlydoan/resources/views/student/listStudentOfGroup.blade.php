@extends("layout.index")

@section("content")
<section class="container bg_container" style="margin-top: 80px;">
@foreach($projects as $project)
        <div id="main_text">
            <img src="img/register48x48.png" />&nbsp; {{$project->group_name}}
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
        @endforeach
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading text-center">
                        <div class="col-sm-3">
                            <a class="list-group-item-success btn btn-default" href="student/project/{{$project->id_group}}/document">Tài liệu đồ án</a>
                        </div>
                        <div class="col-sm-3">
                            <a class="list-group-item-success btn btn-default" href="student/project/{{$project->id_group}}/scheduel">Quản lí lịch trình</a>
                        </div>
                        <div class="col-sm-3">
                            <a class="list-group-item-success btn btn-default" href="student/project/{{$project->id_group}}/evaluation">Đánh giá nhóm</a>
                        </div>
                        <div class="col-sm-3">
                            <a class="btn btn-primary" href="student/project/{{$project->id_group}}/listStudent">Danh sách
                                sinh viên</a>
                        </div>
                    </header>
                    <div class="panel-body">
                        <div class="tab-pane">
                            <!-- danh sách sinh viên -->
                            <div id="list_student" class="tab-pane">
                                <section class="panel">
                                    <div class="panel-body bio-graph-info">
                                        <div>
                                            <h3><i class="glyphicon glyphicon-forward" style="padding:10px 0;"></i>Danh
                                                sách sinh viên</h3>
                                        </div>
                                    
                                        <div class="row">
                                            <div class="title_project">
                                                <h3 class="text-center">Danh sách thành viên</h3>
                                            </div>
                                            <table class="table" id="table_project">
                                                <thead id="thead">
                                                    <tr>
                                                        <th scope="col"  class="col-sm-2">MSSV</th>
                                                        <th scope="col" class="text-center" class="col-sm-2">Họ tên</th>
                                                        <th scope="col" class="text-center" class="col-sm-2">Lớp</th>
                                                        <th scope="col" class="text-center" class="col-sm-3">Email</th>
                                                        <th scope="col" class="text-center" class="col-sm-3">Số điện thoại</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="result">
                                                @foreach($listStudents as $listStudent)
                                                    <tr>
                                                        <td class="text-center"><p>{{$listStudent->username}}<p></td>
                                                        <td class="text-center"><p>{{$listStudent->full_name}}<p></td>
                                                        <td class="text-center"><p>{{$listStudent->class}}<p></td>
                                                        <td class="text-center"><p>{{$listStudent->email}}<p></td>
                                                        <td class="text-center"><p>{{$listStudent->phone}}<p></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection