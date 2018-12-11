@extends("layout.index")

@section("content")
<div class="text-center" style="padding:50px;">
        <h2>Đổi mật khẩu</h2>
    </div>
    <div class="row" style="margin-bottom: 100px">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
            <div class="form">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif

            @if(session('thongbao'))
                <div class="alert alert-danger">
                    {{session('thongbao')}}
                </div>
            @endif
                <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="teacher/password/{{Auth::user()->username}}/edit">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label class="control-label col-sm-3">Mật khẩu cũ</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="old_password" type="password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Mật khẩu mới</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="password" name="password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nhập lại </label>
                        <div class="col-sm-9">
                            <input class="form-control" type="password" name="password_confirmation" />
                        </div>
                    </div>
                    <div class="control-label col-sm-7">
                        <div>
                       
                            <input class="btn btn-default" type="submit" value="Đổi
                          mật khẩu">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
@endsection
