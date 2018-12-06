<div class="table-responsive" >
    <table class="table table-striped table-bordered tabe-sm" id="table_data">
        <thead>
            <tr>
                <th class ="col-lg-2">Username</th>
                <th class ="col-lg-2">Họ tên</th>
                <th class ="col-lg-2">Email</th>
                <th class ="col-lg-2">Số điện thoại</th>
                <th class ="col-lg-2">Lớp</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{$row->username}}</td>
                <td>{{$row->full_name}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->phone}}</td>
                <td>{{$row->class}}</td>
                <td><a class="btn btn-default" name="update" href='admin/user/updateStudent/{{$row->id_student}}'>Sửa</a></td>
                <td><a class="btn btn-default" name="delete" onclick="return confirm('Bạn có muốn xóa?')" href='admin/user/deleteStudent/{{$row->id_student}}'>Xóa</a></td>
            </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <td colspan="10">{{$data->render()}}</td>
            </tr>
        </tfoot>
    </table>
</div>