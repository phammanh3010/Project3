@extends("layout.index")

@section("content")
<section class="container bg_container" style="margin-top: 80px;">
        <div id="main_text">
            <img src="img/register48x48.png" />&nbsp; Nhóm project 3
        </div>
        <div id="hr"></div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div>
                    <div class="col-sm-3"><b>Học kỳ</b></div>
                    <div class="col-sm-9">
                        <p>20181</p>
                    </div>
                </div>
                <form>
                    <div>
                        <div class="col-sm-3"><b>Tên đề tài</b></div>
                        <div class="col-sm-8">
                            <p>Web quản lí đồ án</p>
                        </div>
                    </div>
                </form>
                <div>
                    <div class="col-sm-3"><b>Giảng viên hướng dẫn</b></div>
                    <div class="col-sm-9">
                        <p>PGS.TS Trần Đình Khang</p>
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
                            <a class="list-group-item-success btn btn-default" href="document.html">Tài liệu đồ án</a>
                        </div>
                        <div class="col-sm-3">
                            <a class="btn btn-primary" href="scheduel.html">Quản lí lịch trình
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a class="list-group-item-success btn btn-default" href="evaluate.html">Đánh giá nhóm</a>
                        </div>
                        <div class="col-sm-3">
                            <a class="list-group-item-success btn btn-default" href="list_student.html">Danh sách
                                sinh viên</a>
                        </div>
                    </header>
                    <div class="panel-body">
                        <!--  lich trình thực hiện đồ án -->
                        <div class="tab-pane">
                            <section class="panel">
                                <div class="panel-body bio-graph-info">
                                    <div>
                                        <h3><i class="glyphicon glyphicon-forward" style="padding:10px 0;"></i> Kế
                                            hoạch thực hiện
                                            đồ án</h3>
                                    </div>
                                    @if(session('thongbao'))
                                    <div class="alert alert-success" id="message_update">
                                        {{session('thongbao')}}
                                    </div>
                                    @endif
                                    <div class="row">
                                        <table class="table" id="result">
                                            <tr>
                                                <td class="col-sm-1 text-center"><b>Nhiệm vụ</b></td>
                                                <td class="col-sm-7 text-center"><b>Mô tả yêu cầu</b></td>
                                                <td class="col-sm-2 text-center"><b>Deadline</b></td>
                                                <td class="col-sm-1 text-center"><b>Điểm trừ</b></td>
                                                <td class="text-center"><b>Sửa</b></td>
                                                <td class="text-center"><b>Xóa</b></td>
                                            </tr>
                                            @foreach($scheduel_contents as $scheduel_content)
                                            <tr>
                                                <td>
                                                    <p>{{$scheduel_content->require}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$scheduel_content->require}}</p>
                                                </td>
                                                <td class="text-center">
                                                    <p>{{$scheduel_content->time_deadline}}</p>
                                                </td>
                                                <td class="text-center">
                                                    <p>{{$scheduel_content->penalty}}</p>
                                                </td>
                                                <td><a href="{{url()->current()}}/update/{{$scheduel_content->id_content}}" class="delete btn btn-default">Sửa</a></td>
                                                <td><button type="button" id="{{$scheduel_content->id_content}}" class="delete btn btn-default">Xóa</button></td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    <div id="message"></div>
                                    <div>
                                        <h3><i class="glyphicon glyphicon-forward" style="padding:10px 0;"></i> Thêm
                                            nội dung kế hoạch</h3>
                                    </div>
                                    <!-- @if(count($errors) > 0)
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $err)
                                        {{$err}}<br>
                                        @endforeach
                                    </div>
                                    @endif -->
                                    <div class="panel-body tab-content tab-pane">
                                        <div class="form">
                                            <form class="form-validate form-horizontal" id="feedback_form" action="">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-10"></div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Yêu
                                                        cầu</label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" id="require"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Mô tả</label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" id="descript"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">Thời
                                                        hạn</label>
                                                    <div class="col-sm-3">
                                                        <input class="form-control" type="date" id="deadline"/>
                                                    </div>
                                                    <label class="control-label col-sm-4">Trừ</label>
                                                    <div class="col-sm-1">
                                                        <input class="form-control" id="penalty"/>
                                                    </div>
                                                </div>
                                                <div class="control-label col-sm-6
                                          text-center">
                                                    <button type="button" class="btn btn-default" id="add">Thêm</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <div>
                                    <h3><i class="glyphicon glyphicon-forward" style="padding:10px 0;"></i> Kế
                                        hoạch thực hiện
                                        đồ án do bộ môn đưa ra</h3>
                                </div>
                                <div class="row">
                                    <table class="table">
                                        <tr>
                                            <td class="col-sm-2 text-center"><b>Nhiệm vụ</b></td>
                                            <td class="col-sm-7 text-center"><b>Mô tả yêu cầu</b></td>
                                            <td class="col-sm-2 text-center"><b>Deadline</b></td>
                                            <td class="col-sm-1 text-center"><b>Điểm trừ</b></td>
                                        </tr>
                                        @foreach($scheduel_subject_contents as $scheduel_subject_content)
                                        <tr>
                                            <td>
                                                <p>{{$scheduel_subject_content->require}}</p>
                                            </td>
                                            <td>
                                                <p>{{$scheduel_subject_content->require}}</p>
                                            </td>
                                            <td class="col-sm-2 text-center">
                                                <p>{{$scheduel_subject_content->time_deadline}}</p>
                                            </td>
                                            <td class="col-sm-2 text-center">
                                                <p>{{$scheduel_subject_content->penalty}}</p>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
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
                    require: $("#require").val(),
                    descript: $("#descript").val(),
                    deadline: $("#deadline").val(),
                    penalty: $("#penalty").val(),
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
                        noidung = "<tr><td>" + $("#require").val() + "<p></p></td>";
                        noidung+= "<td><p>" + $("#descript").val() + "</p></td>";
                        noidung+= "<td class='text-center'><p>"+ $("#deadline").val() + "</p></td>"
                        noidung+= "<td class='text-center'><p>"+ $("#penalty").val() + "<p></td>"
                        noidung+= "<td class='text-center'><a href='{{url()->current()}}/update/" + data.output + "' class='btn btn-default' id='update'>Sửa</a></td>";
                        noidung+= "<td class='text-center'><button type='button' id='" + data.output + "' class='delete btn btn-default'>Xoá</button></td>";
                        $('#result').append(noidung);
                        message = "<div class='alert alert-success'>Bạn đã thêm thành công!</div>";
                        $('#message').html(message);
                        $("#require").val("");
                        $("#descript").val("");
                        $("#deadline").val("");
                        $("#penalty").val("");
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
                                if(data.message) {
                                    $('#message').html(data.message);
                                    $('#'+data.id).parent().parent().remove();
                                }      
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