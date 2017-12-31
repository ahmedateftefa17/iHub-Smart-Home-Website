<?php
  include '__ArtistS17Ajax/functions.session.php';
  if(checkSession('tst-api-logedin'))
    header('location: controlPage.php');

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
    <link rel="shortcut icon" type="image/x-icon" href="img/logo-2.png" />
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
</head>

<body id="page-top" class="index" ng-app="myApp">
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <img src="img/logo.png" class="img-responsive img-rounded navbar-brand" alt="TST logo">
                <a class="navbar-brand logo-txt" href="#page-top">TST</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">Services</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">About</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contact Us</a>
                    </li>
                    <li>
                    	<a href = "#" data-toggle="modal" data-target="#myModal1">Sign In</a>
                    </li>
                    <li>
                    	<a href = "#" data-toggle="modal" data-target="#myModal2">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="SmartImage" style="background-color:#e5e0dc">
    	<img src="img/SmartHome.jpg" style="width:100%;height:100%;margin-top:6%;margin-bottom: 7%;">
    </section>

    <section style="background: #18BC9C; color:#fff">
      <div>
        <h1 class="text-center">Coming Soon <small></small></h1>
      </div>
        <!--div class="embed-responsive embed-responsive-4by3 video" style="margin-top: -15% !important;margin-bottom:-32% !important;">
            <iframe class="embed-responsive-item"
  					src="https://www.youtube.com/embed/ClksDN9Y3fo"
  					allowfullscreen>
  			</iframe>
      </div-->
    </section>
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Services</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-arrows-alt fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/services-icons/idea.png" class="img-responsive img-centered" alt="" style="width: 70%;">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-arrows-alt fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/services-icons/plug.png" class="img-responsive img-centered" alt="" style="width: 70%;">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-arrows-alt fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/services-icons/temperature.png" class="img-responsive img-centered" alt="" style="width: 70%;">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-arrows-alt fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/services-icons/password.png" class="img-responsive img-centered" alt="" style="width: 70%;">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-arrows-alt fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/services-icons/entrance.png" class="img-responsive img-centered" alt="" style="width: 70%;">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-arrows-alt fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/services-icons/insurance.png" class="img-responsive img-centered" alt="" style="width: 70%;">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>We are a startup that have a project idea to make lifes easy with some entertainment features that add to your day little fun.</p>
                </div>
                <div class="col-lg-4">
                    <p>Our idea is a smart home that you can control with internet through a website or mobile apps that provide you security and safety</p>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Us</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form method="post">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="msg-name">
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" name="msg-email">
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" name="msg-phone">
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" name="msg-content"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg" name="msg-btn" value="send">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4 col-md-offset-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
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
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Auto Light</h2>
                            <hr class="star-primary">
                            <img src="img/services-icons/idea.png" class="img-responsive img-centered" alt="" style="width: 70%;">
                            <p>Automatically open your place lights by just walking under lamps.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Saving energy</h2>
                            <hr class="star-primary">
                            <img src="img/services-icons/plug.png" class="img-responsive img-centered" alt="" style="width: 70%;">
                            <p>Saving energy is a must, With TST you can control your lights and devices using internet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Temperature</h2>
                            <hr class="star-primary">
                            <img src="img/services-icons/temperature.png" class="img-responsive img-centered" alt="" style="width: 70%;">
                            <p>Wherever your location is, TST weather APP sends you exact temperature and humidity of your place </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Pass-worded Gates</h2>
                            <hr class="star-primary">
                            <img src="img/services-icons/password.png" class="img-responsive img-centered" alt="" style="width: 70%;">
                            <p>With TST you and your family will be totally secured by TST pass-worded gates system.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Doors</h2>
                            <hr class="star-primary">
                            <img src="img/services-icons/entrance.png" class="img-responsive img-centered" alt="" style="width: 70%;">
                            <p>TST doors open Automatically for your entrance, so by door sensor no more need to door holders.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Home safty</h2>
                            <hr class="star-primary">
                            <img src="img/services-icons/insurance.png" class="img-responsive img-centered" alt="" style="width: 70%;">
                            <p>Home safty is our first priority, with TST smoke and gas sensors your home is under a reliable safety control system.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Sign In</h4>
              </div>
              <div class="modal-body">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-5">
                            <form>
                              <div class="row control-group">
                                      <div class="form-group col-xs-12 floating-label-form-group controls">
                                          <label>Email Address</label>
                                          <input type="email" class="form-control" placeholder="Email Address" id="signin-email">
                                          <p class="help-block"></p>
                                      </div>
                                  </div>
                                  <div class="row control-group">
                                      <div class="form-group col-xs-12 floating-label-form-group controls">
                                          <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" id="signin-password">
                                        <p class="help-block"></p>
                                      </div>
                                  </div>
                            </form>
                          </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-success btn-lg" id="signin-btn">Sign In</button>
              </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Sign Up</h4>
              </div>
              <div class="modal-body">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-5">
                              <form>
                                  <div class="row control-group">
                                      <div class="form-group col-xs-12 floating-label-form-group controls">
                                          <label>Name</label>
                                          <input type="name" class="form-control" placeholder="Name" id="signup-name">
                                          <p class="help-block"></p>
                                      </div>
                                  </div>
                                  <div class="row control-group">
                                      <div class="form-group col-xs-12 floating-label-form-group controls">
                                          <label>Email Address</label>
                                          <input type="email" class="form-control" placeholder="Email Address"  id="signup-email">
                                          <p class="help-block"></p>
                                      </div>
                                  </div>
                                  <div class="row control-group">
                                      <div class="form-group col-xs-12 floating-label-form-group controls">
                                          <label>Password</label>
                                          <input type="password" class="form-control" placeholder="Password" id="signup-password">
                                          <p class="help-block"></p>
                                      </div>
                                  </div>
                                  <div class="row control-group">
                                      <div class="form-group col-xs-12 floating-label-form-group controls">
                                          <label>API</label>
                                          <input type="text" class="form-control" placeholder="API" id="signup-api">
                                          <p class="help-block"></p>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-success btn-lg" id="signup-btn">Sign Up</button>
              </div>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/freelancer.min.js"></script>
    <script src="__ArtistS17Ajax/sign[up-in].ajax.js" charset="utf-8"></script>
    <?php
      if(isset($_POST['msg-btn'])) {
        if(!empty($_POST['msg-name']) && !empty($_POST['msg-email']) && !empty($_POST['msg-phone']) && !empty($_POST['msg-content']) && $_POST['msg-btn'] = "send") {
          $_POST['msg-btn'] = "";
            $file = fopen('msgs/' . $_POST['msg-email'] . '_#_' . uniqid() . '.txt', 'w');
          fwrite($file, "name: " . $_POST['msg-name'] . "\r\nemail: " . $_POST['msg-email'] . "\r\nphone: " . $_POST['msg-phone'] . "\r\nmsg: " . $_POST['msg-content']);
          fclose($file);
          echo '<script>alert("Your Message has been sent.");</script>';
        }
        else {
          echo '<script>alert("Some fields were NOT filled");</script>';
        }
      }
    ?>
</body>
</html>
