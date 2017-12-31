<?php
  if(!isset($_POST['roomName']))
    die(json_encode(['redirect']));

  include 'includes.php';

  if(!checkSession("tst-api-logedin"))
    die(json_encode(['no_login']));

  $api = getSession('tst-api-logedin');
  $roomName = trim($_POST['roomName']);

  //
  if(empty($roomName))
    die(json_encode([['error'], ['new-room-name', "This field is required"]]));
  $sql = "SELECT `name` FROM `rooms` WHERE `api` = '$api'";
  $rooms = getQuery($sql);
  if(count($rooms) == __MAX_ROOMS_NUM__)
    die(json_encode([['error'], ['new-room-name', "You had reached the MAX number (5) of rooms."]]));
  foreach ($rooms as $room)
    if(strtolower($room['name']) == strtolower($roomName))
      die(json_encode([['error'], ['new-room-name', "This room name was taken before!"]]));

  $sql = "INSERT INTO `rooms` (`name`, `api`) VALUES ('$roomName', '$api')";
  if(postQuery($sql))
    die(json_encode([['success', "Room has been added successfully"]]));
  else
    die(json_encode([['failed', "db:ERROR!"]]));
