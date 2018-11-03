@extends("layout.index")

@section("content")

<section class="container">
        <div id="myCarousel" class="carousel slide text-center"
          data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="img/a.jpg" height="" width="90%" class="img">
              <div class="carousel-caption">
              </div>
            </div>
            <div class="item">
              <img src="img/b.jpg" height="" width="90%" class="img">
              <div class="carousel-caption">

              </div>
            </div>
            <div class="item">
              <img src="img/c.jpg" height="" width="90%" class="img">
              <div class="carousel-caption">

              </div>
            </div>
          </div>
          <a class="left carousel-control" href="#myCarousel" role="button"
            data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button"
            data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="">
          <h1 class="text-center">Giới thiệu</h1>
          <p>
            Bộ môn Hệ thống Thông tin (HTTT) là một đơn vị thuộc Viện
            Công nghệ thông tin và Truyền thông ra đời
            ngay từ những ngày đầu thành lập Khoa CNTT trước đây (năm 1995) với
            đội ngũ các thầy cô có trình độ
            chuyên môn cao và tâm huyết với nghề.
          </p>
          <p>
            Bộ môn đảm nhận chức năng giảng dạy các môn học chuyên ngành Hệ
            thống thông tin của các loại hình đào tạo đại
            học,và sau đại học thuộc ngành CNTT. Bên cạnh đó, Bộ môn tham gia
            các hoạt động nghiên cứu khoa học, chuyển
            giao công nghệ, hợp tác trong nước và quốc tế. Các hoạt động của Bộ
            môn tập trung chủ yếu vào lĩnh vực công
            nghệ xử lý dữ liệu và tri thức (Data and Knowledge Engineering).
          </p>
        </div>
        <div class="row container" id="img_background">
          <div class="col-lg-12">
            <span></span>
            <h2></h2>
            <p></p>
          </div>
        </div>
        <div class="">
          <h1 class="text-center">Cán bộ giảng viên</h1>
          <div id="myCarousel" class="carousel slide text-center"
            data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <div>
                  <img src="img/1.jpg" height="" width="" class="img-teacher">
                  <div class="">
                    <p>PGS.TS Tần Đình Khang</p>
                    <p>Giảng viên chính</p>
                    <p>Email: khangtd@soict.hust.edu.vn</p>
                    <p>Điện thoại: 0987654321</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div>
                  <img src="img/3.jpg" height="" width="" class="img-teacher">
                  <div class="">
                    <p>PGS.TS Tần Đình Khang</p>
                    <p>Giảng viên chính</p>
                    <p>Email: khangtd@soict.hust.edu.vn</p>
                    <p>Điện thoại: 0987654321</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div>
                  <img src="img/4.jpg" height="" width="" class="img-teacher">
                  <div class="">
                    <p>PGS.TS Tần Đình Khang</p>
                    <p>Giảng viên chính</p>
                    <p>Email: khangtd@soict.hust.edu.vn</p>
                    <p>Điện thoại: 0987654321</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div>
                  <img src="img/1.jpg" height="" width="" class="img-teacher">
                  <div class="">
                    <p>PGS.TS Tần Đình Khang</p>
                    <p>Giảng viên chính</p>
                    <p>Email: khangtd@soict.hust.edu.vn</p>
                    <p>Điện thoại: 0987654321</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>










@endsection