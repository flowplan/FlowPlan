<?php 
session_start();

if(isset($_SESSION['user'])){
    header("Location:/FlowPlan/template.php");
    //Location:/FlowPlan/template.php
    //Location:/template.php
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="Title">FlowPlan</title>
    <link rel="icon" type="image/x-icon" href="css/Sprints.ico">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/rwd.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/scripts.js"></script>
</head>
<body>
    <center>
    <div class="header">
        <div class="logo"><img class="logo_img" src="css/logo2.png" alt="FlowPlan"></div>
        <div class="access_buttons">
        <a href="#researchers"><button class="g_sign" >About FlowPlan</button></a>
        <a href="#whatScrum"><button class="g_sign" >What is Scrum?</button></a>
            <!--
                <h5 class="main_title">FlowPlan: Online Simulation for agile scrum project management</h5>
                <img class=google_button src="css/google.png" alt="G">
                <button onclick="run_login()" class="open_login">LOGIN</button>
            <button onclick="run_signup()" class="open_signup">SIGN-UP</button>-->
        </div>
    </div>
    <div class="body_content">
    <div class="logo-toBody"><img class="logo_img" src="css/logo.png" alt="FlowPlan"></div>
        <p class=header_content>Are you creating a well organized project plan?</p>
        <button onclick="googleSignUp()" class="start_project">Start a Scrum project</button>
    </div>

    <div class="Counts_ofAll">
    <h1>A total of <span class="userCount"></span> users now who tried and use the flowplan</h1>
    <h2>ACTIVITIES</h2>
        <div class="overall">
            <h3>Finished Task</h3>
            <h1 class="finishedCount">0</h1>
        </div>
        <div class="overall">
            <h3>Created Projects</h3>
            <h1 class="projectCounts">0</h1>
        </div>
        <div class="overall">
            <h3>Story Features</h3>
            <h1 class="StoryCounts">0</h1>
        </div>            
    </div>

    <div class="whatScrum" id="whatScrum">
        <h1 style="margin-bottom:30px">Quick understading what is Agile Scrum</h1>
        <iframe class="flowplanScrum" width="780" height="370" src="https://www.youtube.com/embed/IibO1H21Ubs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <p class="whatScrumPharagraph">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agile Scrum is an organize way to create a project such softwares, events, A new model, and many more that can be use for the industry.
            Organizing the project using agile scrum have three list which is the product backlog, sprint backlog and the scrum board.
            This three has a role which specified what we want, what is needed and what are needed to be done to the project.
        </p>
    </div>

    <div class="researchers" id="researchers">
        <h1 style="margin-bottom:30px">About FlowPlan</h1>
        <h2 style="text-align:left;margin-left:15%;">Researchers and Developers</h2>
        <div class="researchers_info">
            <div class="researchers_picture">
                <img src="css/ace.png" alt="ace">
            </div>
            <h3>Ace Pocholo Aguilar</h3>
            <p class="researchers_self"></p>
        </div>
        <div class="researchers_info">
            <div class="researchers_picture">
                <img src="css/keint.png" alt="keint">
            </div>
            <h3>Keint Bajao</h3>
            <p class="researchers_self"></p>
        </div>
        <div class="researchers_info">
            <div class="researchers_picture">
                <img src="css/mardy.png" alt="mardy">
            </div>
            <h3>Mardy Incenares</h3>
            <p class="researchers_self"></p>
        </div>
        
        <p class="researchers_aboutUs">A Capstone project that will help our fellow students to understand the Agile Scrum Project management We the researchers and the developer are creating a Web application that will help the students to learn why the agile scrum is needed in the industry.</p>
    </div>


    <div class="black" style="display: none;">
    
        <div class="outerclose"></div>
        <div class="window" style="display: none;">
            <?php require "login.php";?>
            <?php require "register.php";?>
        </div>

    </div>
    
    <footer>
        <h2>GET IN TOUCH</h2>
        <a href="https://www.facebook.com/EPCST"><div class="touch">
            <img src="css/fb.png" alt="fb">
        </div></a>
        <a href="https://www.youtube.com/channel/UCGQMVO8_CpGE_a4zVAgO50g"><div class="touch">
            <img src="css/yt.png" alt="fb">
        </div></a>
        <a href="https://epcst.edu.ph"><div class="touch">
            <img src="css/epcst.png" alt="epcst">
        </div></a>
        <div>All Rights Reserrved Designed and Developed by Ace Pocholo Aguilar</div>
    </footer>

    </center>

    <?php require "script_login.php";?>
</body>
</html>

