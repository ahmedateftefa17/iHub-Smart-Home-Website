<?php
  if(!isset($_POST['rooms']))
    die(json_decode(['redirect']));

  include 'includes.php';

  if(!checkSession("tst-api-logedin"))
    die(json_decode(['no_login']));

  $api = getSession('tst-api-logedin');

  $settings = "";

  $newRoomFormFile = fopen('_new-room-form', 'r');
  $newRoomFormHtml = fread($newRoomFormFile, filesize('_new-room-form'));
  fclose($newRoomFormFile);

  $settings .= $newRoomFormHtml;

  $sql = "SELECT * FROM `rooms` WHERE `api` = '$api'";
  $rooms = getQuery($sql);
  if($rooms == NULL){
    $settings .= '<br><center><h1>No Rooms have been added yet!</h1><center>';
    die(json_encode(['success', $settings]));
  }
  foreach ($rooms as $room) {
    $roomFile = fopen('_room', 'r');
    $roomHtml = fread($roomFile, filesize('_room'));
    fclose($roomFile);
    $roomHtml = str_ireplace('%name%', $room['name'], $roomHtml);
    $room_id = $room['id'];
    $sql = "SELECT * FROM `pins` WHERE `room_id` = '$room_id' && `api` = '$api'";
    $pins = getQuery($sql);
    $pinsHtml = "";
    if($pins == NULL) $pins = '<center><h1>No pins have been added yet!</h1><center>';
    else
      foreach ($pins as $pin) {
        $pinFile = fopen('_pin', 'r');
        $pinHtml = fread($pinFile, filesize('_pin'));
        fclose($pinFile);
        if($pin['value']) {
          $pinHtml = str_ireplace("%name_state%", $pin['name'] . " is " . "ON.", $pinHtml);
          $pinHtml = str_ireplace("%0|disabled%", '', $pinHtml);
          $pinHtml = str_ireplace("%1|disabled%", 'disabled=""', $pinHtml);
        }
        else {
          $pinHtml = str_ireplace("%name_state%", $pin['name'] . " is" . " OFF.", $pinHtml);
          $pinHtml = str_ireplace("%1|disabled%", '', $pinHtml);
          $pinHtml = str_ireplace("%0|disabled%", 'disabled=""', $pinHtml);
        }
        $pinHtml = str_ireplace("%pin_id%", $pin['id'], $pinHtml);
        $pinsHtml .= $pinHtml;
      }
    $roomHtml = str_ireplace("%pins%", $pinsHtml, $roomHtml);
    $newPinFormFile = fopen('_new-pin-form', 'r');
    $newPinFormHtml = fread($newPinFormFile, filesize('_new-pin-form'));
    fclose($newPinFormFile);
    $roomHtml = str_ireplace("%pin_form%", $newPinFormHtml, $roomHtml);
    $settings .= $roomHtml;
    $settings = str_ireplace("%room_id%", $room_id, $settings);
  }

  die(json_encode(['success', $settings]));
