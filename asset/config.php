<?php
session_start();
require_once "googleapi/vendor/autoload.php";
$gclient = new Google_Client();
$gclient->setClientId("433846795101-s3hu6d23t4ths4nrtg70h1jms5ngegum.apps.googleusercontent.com");
$gclient->setClientSecret("G2uP_kZlGpSUg4N9Vfb8uBV8");
$gclient->setApplicationName("Nutribox");
$gclient->setRedirectUri("http://localhost/2019/project/tugas2-web-sieg/asset/g-callback.php");
$gclient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");


?>