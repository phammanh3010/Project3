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
                <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Mật khẩu cũ</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Mật khẩu mới</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Mật khẩu mới</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="" />
                        </div>
                    </div>
                    <div class="control-label col-sm-7">
                        <div>
                            <input class="btn btn-default" type="submit" value="Đổi
                          mật khẩu"
                                name="add" onclick="Confirm()">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
@endsection