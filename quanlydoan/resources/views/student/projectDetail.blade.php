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
                            <a class="list-group-item-success btn btn-default" href="student/project/{{$project->id_group}}/listStudent">Danh sách
                                sinh viên</a>
                        </div>
                    </header>
                    <div class="panel-body">
                    </div>
                </section>
            </div>
        </div>
    </section>
    @endforeach
@endsection