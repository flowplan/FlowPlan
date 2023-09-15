<?php 
session_start();

if(isset($_SESSION['user'])){
    header("Location:/template.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="Title">FlowPlan Login</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/rwd.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/scripts.js"></script>
</head>
<body>
    <center>
    <div class="header">
        <div class="logo"><img class="logo_img" src="css/logo.png" alt="FlowPlan"></div>
        <div class="access_buttons">
        <button class="g_sign" onclick="googleSignUp()"><img class=google_button src="css/google.png" alt="G">Sign-in with Google</button>
            <!--<button onclick="run_login()" class="open_login">LOGIN</button>
            <button onclick="run_signup()" class="open_signup">SIGN-UP</button>-->
        </div>
    </div>
    <div class="body_content">
    <div class="logo-toBody"><img class="logo_img" src="css/logo.png" alt="FlowPlan"></div>
        <p class=header_content>Are you creating a well organized project plan?</p>
        <button onclick="googleSignUp()" class="start_project">Start a Scrum project</button>
    </div>


    <div class="black" style="display: none;">
    
        <div class="outerclose"></div>
        <div class="window" style="display: none;">
            <?php require "login.php";?>
            <?php require "register.php";?>
        </div>

    </div>
    
    </center>

    <?php require "script_login.php";?>
</body>
</html>

