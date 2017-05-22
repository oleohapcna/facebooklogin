<?php
require_once __DIR__ . '/src/facebook/autoload.php';
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

// $appId = '1860083007650652';
// $appSecret = '098edfcc11bc2462c0cf2545e5fa9db5';
// $fbRedirectURL = 'http://www.mytest.me/Facebook-Login/';
// $fbPermissions = ['email']; 
$appId = '724396314400676';
$appSecret = '262faa2f47786d861d4125410e8b1998';
$fbRedirectURL = 'http://www.mytest.me/facebook/';
$fbPermissions = ['email'];


$fb = new Facebook\Facebook([
  'app_id' => $appId,
  'app_secret' => $appSecret,
  'default_graph_version' => 'v2.8',
]);

// Get redirect login helper
$helper = $fb->getRedirectLoginHelper();

// Try to get access token
try {
    if(isset($_SESSION['facebook_access_token'])){
        $accessToken = $_SESSION['facebook_access_token'];
    }else{
          $accessToken = $helper->getAccessToken();
    }
} catch(FacebookResponseException $e) {
     echo 'Graph returned an error: ' . $e->getMessage();
      exit;
} catch(FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
}
?>
