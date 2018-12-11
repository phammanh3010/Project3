<table class="table table-striped table-advance table-hover">
    <tbody>
        <tr>
            <th class ="col-lg-2">Mã Tài Liệu</th>
            <th class ="col-lg-5">Mô tả yêu cầu</th>
            <th class ="col-lg-2">Thời hạn</th>
            <th class ="col-lg-2">Điểm trừ deadline</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        @foreach($data as $row)
        <tr>
            <td>{{$row->require}}</td>
            <td>{{$row->descript}}</td>
            <td>{{$row->time_deadline}}</td>
            <td>{{$row->penalty}}</td>
            <td><a class="btn btn-default" name="update" href='admin/scheduel/updateScheduel/1/{{$row->id_subject_scheduel}}/{{$row->id_content_scheduel}}'>Sửa</a></td>
            <td><a class="btn btn-default" name="delete" onclick="return confirm('Bạn có muốn xóa?')" href='admin/scheduel/deleteScheduel/1/{{$row->id_subject_scheduel}}/{{$row->id_content_scheduel}}'>Xóa</a></td>
        </tr>
        @endforeach
    </tbody>
</table>