<?php
/*

$name = $_GET["name"];
$gmail = $_GET["email"];

if(isset($name) && isset($gmail))
{
  require_once "class.php";
  $flowplan = new flowPlan;
  $api_login = $flowplan->google_sign_in($name, $email);

  if ($api_login > 0) {
    session_start();
    $_SESSION['user'] = $name;
    $_SESSION['mode'] = "google";
    echo json_encode($api_login);
    header("Location:../template.php");
  }
  else
  {
    echo "error";
    echo json_encode($api_login);
  }
}
else
{
  header("Location:\index.php");
}

*/
    require_once "composerFiles/vendor/autoload.php";

// init configuration
$clientID = '501663763910-eeegishhlms0eac19jlgtpec3fn05a3k.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'https://tender-firefly-85645.pktriot.net/FlowPlan/class/google-signing.php';
   
// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
  
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
   
  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
  $image =  $google_account_info->picture;
  $locale =  $google_account_info->locale;
  
  echo $locale . " <br>";
  echo $image . " <br>";
  echo $email . " <br>";
  echo $name;
  //codes here ...
  require_once "class.php";
  $flowplan = new flowPlan;
  $api_login = $flowplan->google_sign_in($name, $email, $image, $locale);

  if ($api_login > 0) {
    session_start();
    $_SESSION['user'] = $name;
    $_SESSION['image'] = $image;
    $_SESSION['email'] = $email;
    $_SESSION['mode'] = "google";
    echo json_encode($api_login);
    header("Location:../template.php");
  }
  else
  {
    echo "error";
    echo json_encode($api_login);
  }


  // now you can use this profile info to create account in your website and make user logged in.
} else {
  //echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
  $authUrl = $client->createAuthUrl();
  header("Location:". $authUrl);
}



?>