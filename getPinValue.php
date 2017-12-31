<?php
  if(!isset($_GET['api']) || !isset($_GET['pinNum']))
    die();

  include '__ArtistS17Ajax/includes.php';

  if(!id_exists('pins', $_GET['api'], 'api'))
    die('api does not exist');

  if(!id_exists('pins', $_GET['pinNum'], 'number') && $_GET['pinNum'] != '*')
    die('pin does not exist');

  $api = $_GET['api'];
  $number = $_GET['pinNum'];
  if($number != '*') {
    $sql = "SELECT `value` FROM `pins` WHERE `api` = '$api' && `number` = '$number'";
    $result = getQuery($sql);
    if($result == NULL)
      die('db:ERROR!');
    else
      echo $result[0]['value'];
  }
  else {
    $values = "";
    for ($number = 22; $number < 54; $number++) {
      $sql = "SELECT `value` FROM `pins` WHERE `api` = '$api' && `number` = '$number'";
      $result = getQuery($sql);
      if($result == NULL)
        $values .= "0";
      else
        $values .= $result[0]['value'];
    }
$values .= "#";
    echo $values;
  }
  die();
