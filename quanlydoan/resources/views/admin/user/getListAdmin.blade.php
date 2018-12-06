<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th class ="col-lg-3">Username</th>
                <th class ="col-lg-3">Họ tên</th>
                <th class ="col-lg-2">Email</th>
                <th class ="col-lg-2">Số điện thoại</th>
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
                <td><a class="btn btn-default" name="update" href='admin/user/updateAdmin/{{$row->username}}'>Sửa</a></td>
                <td><a class="btn btn-default" name="delete" onclick="return confirm('Bạn có muốn xóa?')" href='admin/user/deleteAdmin/{{$row->username}}'>Xóa</a></td>
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