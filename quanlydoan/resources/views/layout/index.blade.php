<!DOCTYPE html>
<html lang="en">

  <head>
    <title></title>
    <meta charset="utf-8">

    <!-- đường dẫn cơ bản đến trang tài nguyên -->
    <base href="{{asset('')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link href="css/style1.css" rel="stylesheet" type="text/css" />
  </head>

  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    @include("layout.header")
      @yield("content")     
    @include("layout.footer")
    </body>

  </html>