@extends("layout.index")

@section("content")
<section class="container bg_container" style="margin-top: 80px;">
    <div id="main_text">
      <img src="img/register48x48.png" />&nbsp; Dự án của bạn
    </div>
    <div id="hr">
    </div>
    <form>
      <label>Học kỳ</label>
      <select name="semester" id="search">
        <option value="20182">20182</option>
        <option value="20181" selected>20181</option>
        <option value="20172">20172</option>
        <option value="20171">20171</option>
        <option value="20162">20162</option>
        <option value="20161">20161</option>
      </select>
    </form>
    <div class="title_project">
      <h3 class="text-center">Danh sách đồ án</h3>
    </div>
    <table class="table" id="table_project">
      <thead id="thead">
        <tr>
          <th scope="col" class="col-sm-2">Giảng viên</th>
          <th scope="col" class="col-sm-3">Tên nhóm</th>
          <th scope="col" class="col-sm-4">Đề tài</th>
          <th scope="col" class="col-sm-2">Đã hoàn thành</th>
          <th scope="col" class="col-sm-1">Thao tác</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
    <div class="text-center">
      <a href="student/project/" class="btn btn-primary text-center">Tạo Đồ Án</a>
    </div>
  </section>
                      
                      
                      <script>
                        $(document).ready(function(){

                            $query = $('#search').find("option:selected").val();
                            fetch_customer_data($query);

                            function fetch_customer_data(query)
                            {
                                $.ajax({
                                    url:"{{url()->current()}}",
                                    method:'post',
                                    data:{query:query, _token: '{{csrf_token()}}'},
                                    dataType:'json',
                                    success:function(data)
                                    {
                                        $('tbody').html(data.table_data);
                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                     console.log(errorThrown);
                                 }
                             })
                            }

                            $('#search').change(function () {
                              var query = $(this).find("option:selected").val();
                              fetch_customer_data(query);
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