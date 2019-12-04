<?php
require_once "config.php";
if(isset($_GET['access_token'])){
    $gclient->setAccessToken($_SESSION['access_token']);
}
else if(isset($_GET['code'])){
    $token = $gclient->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token;
}
else{
    header('location: ../login.php');
    exit();
}

$oAuth = new Google_Service_Oauth2($gclient);
$userData = $oAuth->userinfo_v2_me->get();
echo "<pre>";
var_dump($userData);
$_SESSION['fullName'] = $userData['name'];
$_SESSION['email'] = $userData['email'];
$_SESSION['gender'] = $userData['gender'];
$_SESSION['picture'] = $userData['picture'];
$_SESSION['familyName'] = $userData['familyname'];
$_SESSION['givenName'] = $userData['givenName'];
header('location: ../index.php');
exit();

//$_GET['authuser'];

?>