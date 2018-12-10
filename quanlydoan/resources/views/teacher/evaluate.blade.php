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
                            <a class="list-group-item-success btn btn-default" href="teacher/project/{{$project->id_group}}/document">Tài liệu đồ án</a>
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
                        <!-- Tieu chí đánh giá -->
                        <div class="tab-pane">
                            <section class="panel">
                                <div class="panel-body bio-graph-info">
                                    <div>
                                        <h3><i class="glyphicon glyphicon-forward" style="padding:10px 0;"></i> Tiêu chí đánh giá đồ án</h3>
                                    </div>
                                    @if(session('thongbao'))
                                    <div id="message_update" class="alert alert-success">
                                        {{session('thongbao')}}
                                    </div>
                                    @endif
                                    <!-- <div id="message_delete"></div> -->
                                    <div class="row">
                                        <table class="table" id="result">
                                            <tr>
                                                <td class="col-sm-9 text-center"><b>Tiêu chí</b></td>
                                                <td class="col-sm-2 text-center"><b>Điểm cộng/trừ</b></td>
                                                <td class="text-center"><b>Sửa</b></td>
                                                <td class="text-center"><b>Xóa</b></td>
                                            </tr>
                                            @foreach($evaluations as $evaluation)   
                                            <tr>
                                                <td>
                                                    <p>{{$evaluation->content}}</p>
                                                </td>
                                                <td class="text-center">
                                                    <p>{{$evaluation->bonus}}</p>
                                                </td>
                                                <td class="text-center"><a href="{{url()->current()}}/update/{{$evaluation->id_evalution_criteria}}" class="btn btn-default" id="update">Sửa</a></td>
                                                <td class="text-center"><button type="button" class="delete btn btn-default" id="{{$evaluation->id_evalution_criteria}}">Xóa</button></td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    <div id="message"></div>
                                    <div class="row panel-body">
                                        <div>
                                            <h3><i class="glyphicon glyphicon-forward" style="padding:10px 0;"></i> Thêm tiêu chi</h3>
                                        </div>
                                        <div id="error"></div>
                                        <div class="panel-body tab-content tab-pane">
                                            <div class="form">
                                                <form class="form-validate form-horizontal" action="">
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-1" >Tiêu chí</label>
                                                        <div class="col-sm-6">
                                                            <textarea type="text" class="form-control" id="content"></textarea>
                                                        </div>
                                                        <label class="control-label col-sm-3">Điểm cộng/trừ</label>
                                                        <div class="col-sm-1">
                                                            <input type="number" class="form-control" id="bonus" step="0.25" min="0" max="10"/>
                                                        </div>
                                                    </div>
                                                    <div class="control-label col-sm-6 text-center">
                                                        <button type="button" class="btn btn-default" id="add">Thêm</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="panel-body tab-content tab-pane">
                                            <h3><i class="glyphicon glyphicon-forward" style="padding:10px 0;"></i> Đánh giá tổng thể nhóm</h3> 
                                            <h4 class="text-center">Điểm hiện tại: 5.6</h4>
                                            <h4 class="text-center">Điểm cuối cùng 8.5</h4>
                                        </div>
                                    </div>
                                </div>
                            </section>
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
                        content: $("#content").val(),
                        bonus: $("#bonus").val(),
                        _token: '{{csrf_token()}}'
                    },
                    success:function(data)
                    {
                        if(data.error) {
                            if($('#message_update')) {
                                $('#message_update').remove();
                            }
                            $('#message').children().remove();
                            jQuery.each(data.error, function(key, value){
                                $('#message').append("<p class='alert alert-danger'>"+value+"</p>");
                  		    });
                        }
                        else {
                            if($('#message_update')) {
                                $('#message_update').remove();
                            }
                            noidung = "<tr><td>" + $("#content").val() + "<p></p></td>";
                            noidung+= "<td class='text-center'><p>" + $("#bonus").val() + "</p></td>";
                            noidung+= "<td class='text-center'><a href='{{url()->current()}}/update/" + data.output + "' class='btn btn-default'>Sửa</a></td>";
                            noidung+= "<td class='text-center'><button type='button' id='" + data.output + "' class='delete btn btn-default'>Xoá</button></td></tr>";
                            $('#result').append(noidung);
                            message = "<div class='alert alert-success'>Bạn đã thêm thành công!</div>";
                            $('#message').html(message);
                            $("#content").val("");
                            $("#bonus").val("");
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
                                if($('#message_update')) {
                                    $('#message_update').remove();
                                }
                                var message = "<div class='alert alert-success'>Bạn đã xoá thành công!</div>";
                                $('#message').html(message);
                                $('#'+id).parent().parent().remove();     
                            },
                            error: function(XMLHttpRequest, textStatus, errorThrown) {
                                console.log(errorThrown);
                            }
                        });
                    }
                });
            });	
        // });	
 	</script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection