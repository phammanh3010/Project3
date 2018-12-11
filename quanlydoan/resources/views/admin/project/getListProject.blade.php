<table class="table table-striped table-advance table-hover">
    <thead>
        <tr>
            <th class ="col-lg-1">ID nhóm</th>
            <th class ="col-lg-1">Kì</th>
            <th class ="col-lg-2">Giảng viên</th>
            <th class ="col-lg-3">Đề tài</th>
            <th class ="col-lg-2">Sinh viên</th>
            <th class ="col-lg-2">Tài liệu</th>
        </tr>
    </thead>
    <tbody>
       @foreach($teacher as $row)
        <tr>
            <td>{{$row->id_group}}</td>
            <td>{{$row->semester}}</td>
            <td>{{$row->teacher_full_name}}</td>
            <td>{{$row->project_name}}</td>
            <td>
                @foreach($student as $stu)
                    @if($stu->id_group == $row->id_group)
                        {{$stu->student_full_name}}<br>
                    @endif
                @endforeach
            </td>
            <td>
                @foreach($doc as $d)
                    @if($d->id_group == $row->id_group)
                        {{$d->type}}<br>
                    @endif
                @endforeach
            </td>
        </tr>
        @endforeach

    </tbody>
</table>