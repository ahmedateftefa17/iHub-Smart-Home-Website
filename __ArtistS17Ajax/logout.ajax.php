<?php
  if(!isset($_POST['logout']))
    die(json_encode(['error']));

  include 'functions.session.php';

  if(checkSession("tst-api-logedin"))
    unsetSession("tst-api-logedin");

  die(json_encode(['loggedout']));
