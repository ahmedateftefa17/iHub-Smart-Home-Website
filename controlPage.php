<?php
  include '__ArtistS17Ajax/functions.session.php';
  if(!checkSession('tst-api-logedin'))
    header('location: index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>TST For Smart Homes</title>
  <link rel="shortcut icon" type="image/x-icon" href="img/tst.png" />
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
</head>
<body id="page-top" class="index" style="background: #333; color:#fff">
  <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
        </button>
        <img src="img/tst.png" class="img-responsive img-rounded navbar-brand" alt="TST logo">
        <a class="navbar-brand logo-txt" href="#page-top">TST</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li class="hidden">
                <a href="#page-top"></a>
            </li>
            <li>
                <a href="" id="logout-btn"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>
  <section class="settings" id="settings"></section>
  <footer class="text-center">
    <div class="footer-above">
      <div class="container">
        <div class="row">
          <div class="footer-col col-md-4 col-md-offset-4">
            <h3>Around the Web</h3>
            <ul class="list-inline">
              <li><a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a></li>
              <li><a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a></li>
              <li><a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a></li>
              <li><a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-below">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            Copyright &copy; TurboSonic IT 2016
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
    <a class="btn btn-primary" href="#page-top"><i class="fa fa-chevron-up"></i></a>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>
  <script src="js/freelancer.min.js"></script>
  <script src="js/main.js" charset="utf-8"></script>
  <script src="__ArtistS17Ajax/updateControlPanel.ajax.js" charset="utf-8"></script>
</body>

</html>
