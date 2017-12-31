<?php
  if(!isset($_POST['pinData']))
    die(json_encode(['redirect']));

  include 'includes.php';

  if(!checkSession("tst-api-logedin"))
    die(json_encode(['no_login']));

  $api = getSession('tst-api-logedin');
  $pinData = explode('|', $_POST['pinData']);
  $pinId = $pinData[0];
  $pinValue = $pinData[1];

  if(!id_exists('pins', $pinId))
    die(json_encode([['failed', "db:ERROR! Pin ID does NOT Exist"]]));

  $sql = "UPDATE `pins` SET `value` = '$pinValue' WHERE `id` = '$pinId'";
  if(postQuery($sql))
    die(json_encode([['success', "Pin has been updated successfully"]]));
  else
    die(json_encode([['failed', "db:ERROR!"]]));
