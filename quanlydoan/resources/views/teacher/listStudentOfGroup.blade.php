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
                            <a class="list-group-item-success btn btn-default" href="student/project/{{$project->id_group}}/listStudent">Danh sách
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
                                    </div>
                                    <div class="row">
                                        <div class="title_project">
                                            <h3 class="text-center">Danh sách thành viên</h3>
                                        </div>
                                        <!-- @if(session('thongbao'))
                                        <div class="alert alert-success">
                                            {{session('thongbao')}}
                                        </div>
                                        @endif -->
                                        <table class="table" id="table_project">
                                            <thead id="thead">
                                                <tr>
                                                    <th scope="col"  class="col-sm-2">MSSV</th>
                                                    <th scope="col" class="text-center" class="col-sm-2">Họ tên</th>
                                                    <th scope="col" class="text-center" class="col-sm-2">Lớp</th>
                                                    <th scope="col" class="text-center" class="col-sm-3">Email</th>
                                                    <th scope="col" class="text-center" class="col-sm-3">Số điện thoại</th>
                                                    <th scope="col" class="text-center">Xóa</th>
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
                                                    <td class="text-center"><button type="button" class=" delete btn btn-default" id="{{$listStudent->id_group_student}}">Xóa</button></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="message"></div>
                                    <div class="row panel-body">
                                        <div class="panel-body bio-graph-info">
                                            <h3><i class="glyphicon glyphicon-forward" style="padding:10px 0;"></i>Thêm sinh viên</h3>
                                        </div>
                                        <div class="form">
                                            <form class="form-validate form-horizontal">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Thanh viên</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="username"/>
                                                    </div>
                                                </div>
                                                <div class="control-label col-sm-6 text-center">
                                                    <button type="button"class="btn btn-default" id="add">Thêm</button>
                                                </div>
                                            </form>
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
    <script>
        $(document).ready(function(){
            function add() {
                $.ajax({
                    url:'{{url()->current()}}',
                    type:'post',
                    dataType: 'json',
                    data: {
                        username: $("#username").val(),
                        _token: '{{csrf_token()}}'
                    },
                    success:function(data)
                    {   
                        if(data.error_student_not_exist) {
                            var error = "<div class='alert alert-danger'>Sinh viên không tồn tại!</div>";
                            $('#message').html(error);
                        }

                        else if(data.error_student_in_group) {
                            var error = "<div class='alert alert-danger'>Sinh viên đã ở trong nhóm!</div>"
                            $('#message').html(error);
                        } else {
                            noidung = "<tr><td class='text-center'>" + data.username + "<p></p></td>";
                            noidung+= "<td><p class='text-center'>" + data.full_name + "</p></td>";
                            noidung+= "<td><p class='text-center'>" + data.class + "</p></td>";
                            noidung+= "<td><p class='text-center'>" + data.email + "</p></td>";
                            noidung+= "<td><p class='text-center'>" + data.phone + "</p></td>";
                            noidung+= "<td class='text-center'><button type='button' id='" + data.id_group_student + "' class='delete btn btn-default'>Xóa</a></td>";
    
                            $('#result').append(noidung);
                            message = "<div class='alert alert-success'>Bạn đã thêm thành công!</div>";
                            $('#message').html(message);
                        }       
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log(errorThrown);
                    }
                })
            }

            $("#add").click(function() {
                add();
            });
        });
        </script>
        <script>
            $(document).on('click', 'button.delete', function() {
                var id = $(this).attr('id');
                bootbox.confirm("Bạn chắc chắn muốn xóa?", function(result) {
                    if(result) {
                        $.ajax({
                            url: '{{url()->current()}}/delete',
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                id: id,
                                _token: '{{csrf_token()}}'
                            },
                            success:function(data)
                            {
                                var message = "<div class='alert alert-success'>Bạn đã xoá thành công!</div>";
                                $('#message').html(data.error);
                                $('#'+id).parent().parent().remove();    
                            },
                            error: function(XMLHttpRequest, textStatus, errorThrown) {
                                console.log(errorThrown);
                            }
                        });
                    }
                });
            });
 	</script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection