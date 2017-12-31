<?php
  if(!isset($_POST['email']) || !isset($_POST['password']))
    die(json_encode([['redirect']]));

  include 'includes.php';

  $email = $_POST['email'];
  $password = $_POST['password'];

  $result = array();

  $vali_email = validate($email, 'email', true);
  if($vali_email['result']) $email = $vali_email['value'];
  else $result[] = ['signin-email', $vali_email['msg']];

  if(empty($password)) $result[] = ['signin-password', __REQUIRED__];
  else if(strlen($password) < 4 || strlen($password) > 50) $result[] = ['signup-password', "Password length MUST be between 4 and 50"];

  if(count($result) > 0) {
    array_unshift($result, ['error']);
    die(json_encode($result));
  }
  else {
    if(!id_exists('users', $email, 'email')) $result[] = ['signin-email', "This E-Mail has NOT been registered before!"];

    if(count($result) > 0) {
      array_unshift($result, ['error']);
      die(json_encode($result));
    }
    else {
      $sql = "SELECT `password`, `api` FROM `users` WHERE `email` = '$email'";
      $data = getQuery($sql);
      if($data != NULL) {
        $data = $data[0];
        if($data['password'] === $password){
          array_unshift($result, ['success', 'controlPage.php']);
          setSession(['tst-api-logedin' => $data['api']]);
        }
        else {
          $result[] = ['signin-password', "Invalid Password!"];
          array_unshift($result, ['error']);
        }
      }
      else {
        array_unshift($result, ['failed', "ERROR! Please, Send email with screenahot to this email info@tst.890m.com\n We're sorry for that and we'll fix this soon"]);
      }
      die(json_encode($result));

    }
  }
