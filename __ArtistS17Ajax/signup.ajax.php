<?php
  if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['api']) || !isset($_POST['password']))
    die(json_encode([['redirect']]));

  include 'includes.php';

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $api = $_POST['api'];

  $result = array();

  $vali_name = validate($name, 'fullname', true);
  if($vali_name['result']) $name = $vali_name['value'];
  else $result[] = ['signup-name', $vali_name['msg']];

  $vali_email = validate($email, 'email', true);
  if($vali_email['result']) $email = $vali_email['value'];
  else $result[] = ['signup-email', $vali_email['msg']];

  if(id_exists('users', $email, 'email')) $result[] = ['signup-email', "This E-Mail has been registered before!"];

  if(empty($password)) $result[] = ['signup-password', __REQUIRED__];
  else if(strlen($password) < 4 || strlen($password) > 50) $result[] = ['signup-password', "Password length MUST be between 4 and 50"];

  if(empty($api)) $result[] = ['signup-api', __REQUIRED__];
  else if(strlen($api) != 20) $result[] = ['signup-api', "api length MUST be ". $api . " api count = " . strlen($api)];
  else if(!id_exists('apis', $api, 'code')) $result[] = ['signup-api', "This API does NOT exist"];

  if(count($result) > 0) {
    array_unshift($result, ['error']);
    die(json_encode($result));
  }
  else {
    $sql = "INSERT INTO `users` (`name`, `email`, `password`, `api`) VALUES ('$name', '$email', '$password', '$api')";
    if(postQuery($sql)) {
      array_unshift($result, ['success', 'controlPage.php']);
      setSession(['tst-api-logedin' => $api]);
    }
    else array_unshift($result, ['failed', "ERROR! Please, Send email with screenahot to this email info@tst.890m.com\n We're sorry for that and we'll fix this soon"]);
    die(json_encode($result));
  }
