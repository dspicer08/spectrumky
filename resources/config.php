<?php
  $root=pathinfo($_SERVER['SCRIPT_FILENAME']);
  define ('BASE_FOLDER', basename($root['dirname']));
  define ('SITE_ROOT',    realpath(dirname(__FILE__)).'/');
  define ('SITE_URL',    'https://'.$_SERVER['HTTP_HOST'].'/');
  define ('CURRENT_BASE', 'https://'.$_SERVER['HTTP_HOST'].'/'.BASE_FOLDER.'/');
  define ('ADMIN_URL', SITE_URL.'admin/');
  define ('PRINTFUL_KEY', 'aphvp5g9-7l76-amaa:lf9v-b5k5jmu3e4n4');

  try{
  $conn = new PDO("mysql:host=localhost;dbname=spectrum", 'user', 'baF7JCMc6TzwEXwL');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(PDOException $e){
    header('Location: https://spectrumky.com/systemerror.php');
  }
 ?>
