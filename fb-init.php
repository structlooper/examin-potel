<?php

session_start();
require './vendor/autoload.php';

$fb = new Facebook\Facebook([
    'appid' => '1751163911724495',
    'app_secret' => 'fbbd8fd96f95ee5a1bfec621575f1085',
    'default_graph_version' => 'v2.7'



])

$helper = $fb->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl"http://localhost/"

print_r($login_url)

?>