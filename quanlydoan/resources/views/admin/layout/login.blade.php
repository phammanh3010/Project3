
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>Trang chủ</title>
        <base href="{{asset('')}}">
        <!-- Bootstrap CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="bootstrap/css/elegant-icons-style.css" rel="stylesheet" />
        <link href="bootstrap/css/font-awesome.min.css" rel="stylesheet" />
        <!-- Custom styles -->
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <link href="bootstrap/css/style-responsive.css" rel="stylesheet" />
    </head>

    <body>
        <!-- container section start -->
        <section id="container" class="">
          @include("admin.layout.header")
          @yield("content")
        </section>
          @include("admin.layout.footer")
        <!-- container section end -->
        <!-- javascripts -->
        <script src="bootstrap/js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- nicescroll -->
        <script src="bootstrap/js/jquery.scrollTo.min.js"></script>
        <script src="bootstrap/js/jquery.nicescroll.js" type="text/javascript"></script>
        <!--custome script for all page-->
        <script src="bootstrap/js/scripts.js"></script>
    </body>
</html>