<?php
@session_start();
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
require 'includes/oauth_config.php';
require 'includes/oauth_lib.php';
$oauth = new OAuth();
$oauth->init();
if($oauth->authCode){
$_SESSION['authcode'] = $oauth->authCode;

}
if($oauth->user['loggedIn']){
  $_SESSION['user_id'] = $oauth->user['id'];
  $_SESSION['username'] = $oauth->user['username'];
  print_r($oauth->user);
  echo "<a href='includes/logout.php'>Sign Out</a> " ;
  echo "<a href='views/profile.php'></a>";
}
else {
  echo "<a href='$oauth->signinURL'>Sign In</a> "  ;
}
