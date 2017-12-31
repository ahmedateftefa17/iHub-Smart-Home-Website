<?php
  if(!isset($_POST['pinName']) || !isset($_POST['pinNum']) || !isset($_POST['roomId']))
    die(json_encode(['redirect']));

  include 'includes.php';

  if(!checkSession("tst-api-logedin"))
    die(json_encode(['no_login']));

  $api = getSession('tst-api-logedin');
  $pinName = trim($_POST['pinName']);
  $pinNum = trim($_POST['pinNum']);
  $roomId = trim($_POST['roomId']);

  //
  if(empty($pinName))
    die(json_encode([['error'], ['new-pin-name-'.$roomId, "This field is required"]]));
  if(empty($pinNum))
    die(json_encode([['error'], ['new-pin-num-'.$roomId, "This field is required"]]));
  if(!preg_match("/^[0-9]/", $pinNum))
    die(json_encode([['error'], ['new-pin-num-'.$roomId, "This MUST be number"]]));
  $pinNum += 21;
  $sql = "SELECT `name`, `number` FROM `pins` WHERE `api` = '$api' && `room_id` = '$roomId'";
  $roomPins = getQuery($sql);
  foreach ($roomPins as $pin)
    if(strtolower($pin['name']) == strtolower($pinName))
      die(json_encode([['error'], ['new-pin-name-'.$roomId, "This pin name was taken before!"]]));
  foreach ($roomPins as $pin)
    if(strtolower($pin['number']) == strtolower($pinNum))
      die(json_encode([['error'], ['new-pin-num-'.$roomId, "This pin number was taken before in this room!"]]));
  if($pinNum > __LAST_PIN_NUM__ || $pinNum < __FIRST_PIN_NUM__)
    die(json_encode([['error'], ['new-pin-num-'.$roomId, "This pin number is NOT in the board!"]]));
  $sql = "SELECT `number` FROM `pins` WHERE `api` = '$api'";
  $apiPins = getQuery($sql);
  foreach ($apiPins as $pin)
    if(strtolower($pin['number']) == strtolower($pinNum))
      die(json_encode([['error'], ['new-pin-num-'.$roomId, "This pin number was taken before in another room!"]]));
  $sql = "INSERT INTO `pins` (`name`, `api`, `room_id`, `value`, `number`) VALUES ('$pinName', '$api', '$roomId', 0, '$pinNum')";
  if(postQuery($sql))
    die(json_encode([['success', "Pin has been added successfully"]]));
  else
    die(json_encode([['failed', "db:ERROR!"]]));
