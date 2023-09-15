<?php
session_start();
$profile_name = $_SESSION['user'];
$profile_image = $_SESSION['image'];
$myProjectId = $_SESSION['projectId'];
$profile_mode = $_SESSION['mode'];
$roleId = $_SESSION["roleId"];
$session_color = $_SESSION["color"];
$roleName = "";

if($roleId == 1){$roleName = "Scrum Master";}
else if($roleId == 2){$roleName = "Product Owner";}
else if($roleId == 3){$roleName = "Quality Assurance";}
else if($roleId == 4){$roleName = "Software Engineer";}
else if($roleId == 5){$roleName = "Designer";}
else if($roleId == 7){$roleName = "Client";}
else if($roleId == 8){$roleName = "Other";}
else {$roleName = "Not Assigned";}

if(!isset($_SESSION['user'])){
    header("Location:\index.php");
}

if(!isset($_SESSION['projectId'])){
    header("Location:/FlowPlan/template.php");
    //"Location:FlowPlan/template.php"
    //"Location:/template.php"
}

if(isset($_SESSION['email'])){
    $profile_email = $_SESSION['email'];
}
else
{
    $profile_email = "";
}

/*
file adjustment

Index
Template
Dashboard
LogoutProject


*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="Title">Dashboard</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/kanban.css">
    <link rel="stylesheet" href="css/template.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/rwd.css">
    <link rel="icon" type="image/x-icon" href="css/Sprints.ico">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/Chart.js"></script>
    <script src="js/loader.js"></script>
    <script src="js/scripts.js"></script>
</head>
<body>
    <span class='dateTimeTrack'></span>
    <center>
    <div class="header">
        <div class="logo"><img class="logo_img" src="css/logo2.png" alt="FlowPlan"></div>
        <div class="access_buttons access_buttons_rwd">
            <p>
                <strong><?php echo $profile_name?></strong><br><br>
                <span><div class="role-color"></div></span>
                <span class="role"><?php echo $roleName;?></span>
                <img class="profile_pic" src="<?php echo $profile_image;?>" alt="Me">
            </p>
        </div>
    </div>
    <div class="menu_content">
    <br>
    <div class="head_menu"><h3 class='openProject' onclick="proceed()">Open Projects <img class='New_project' src="css/addProject.png" alt=""></h3></div>
    
    <div class="summary_menu menu_active">Summary</div>
    <div class="product_menu">Product Backlog</div>
    <div class="sprint_menu">Sprint Backlog</div>
    <div class="board_menu">Scrum Board</div>
    <br><br>
    <div class="help_menu">How to use?</div>
    
    <button onclick="logout()" class="btn_logout">Logout</button>
    </div>

    <div class="dashboard_content">
        <div class="summary_content" style="display: block;">
            <h4 class="h4_projInfo1">Enrollment System / Summary</h4>
            <h2 class="h2_sum"><span id='trackDay'> Good Day!</span> &nbsp; <?php echo $profile_name?></h2>
            
            <?php include "summary.php";?>
        </div>
        <div class="product_content" style="display: block;">
            <h4 class="h4_projInfo2">Product Backlog / Enrollment System</h4>
            <h2 class="h2_sum">Create all the stories of your project</h2>
            <?php include "product.php";?>
        </div>
        <div class="sprint_content" style="display: block;">
            <h4 class="h4_projInfo3">Sprint Backlog / Enrollment System</h4>
            <h2 class="h2_sum">Organized Project Features for each Sprints</h2>
            <?php include "sprint.php";?>
        </div>
        <div class="board_content" style="display: block;">
            <h4 class="h4_projInfo4">Scrum Board / Sprint 1 / Enrollment System</h4>
            <h2 class="h2_sum">Task work tile for you and your Team</h2>
            <?php include "board.php";?>
        </div>
    </div>

    <?php require "hidden.php";?>
    <?php require "script_temp.php";?>
    <?php require "script_dash.php";?>

    <div class="checkedRole">
    <?php require "dashboard-window.php";?>
    </div>
    <?php require "dashboard-window2.php";?>

    
    
</body>