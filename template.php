<?php
session_start();
$profile_name = $_SESSION['user'];
$profile_image = $_SESSION['image'];
$profile_mode = $_SESSION['mode'];
$profile_email = $_SESSION['email'];
$_SESSION['message'] = "";

if(!isset($_SESSION['user'])){
    header("Location:\index.php");
}


if(isset($_SESSION['projectId'])){
    header("Location:/FlowPlan/dashboard.php");
    //Location:/FlowPlan/dashboard.php
    //Location:/dashboard.php
}

if(isset($_SESSION['email'])){
    $profile_email = $_SESSION['email'];
}
else
{
    $profile_email = "";
}
//if the project still exist
if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
}
else{
    $msg = "none";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="Title">FlowPlan Projects</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/x-icon" href="css/Sprints.ico">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/template.css">
    <link rel="stylesheet" href="css/rwd.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    
    <script src="js/scripts.js"></script>
</head>
<body>
    <center>
    <div class="header">
        <div class="logo"><img class="logo_img" src="css/logo2.png" alt="FlowPlan"></div>
        <div class="access_buttons access_buttons_rwd">
            <p>
                <strong><?php echo $profile_name?></strong><br><br>
                <span><div class="role-color" style='background-color:unset; border: none;'></div></span>
                <span style='right:0;' class="role"><?php echo $profile_email?></span>
                <img class="profile_pic" src="<?php echo $profile_image;?>" alt="Me">
            </p>
        </div>
    </div>

    

    <div class="choose_tempalte">
        <p class="header_content template_content">Create Project.</p>
        <div class="setup_template">
            <p><strong>Title:</strong> &nbsp; <input maxlength="30" class="template_project_name" type="text" placeholder="Name of your project you want to create."> &nbsp;<button class="create-myProject" onclick="blackproj('blank')">Create Project</button></p>
        </div>

        <!--<div class="template_holder">
            <div class="template">
                <p class="template_name">Blank Project</p>
                <p class="template_info">Clean Project</p>
                <button onclick="blackproj('blank')">Select</button>
            </div>
        </div>

        <div class="template_holder">
            <div class="template">
                <p class="template_name">Project Management</p>
                <p class="template_info">Manage Activities for Completing Bussiness Project</p>
                <button onclick="dashboard()">Select</button>
            </div>
        </div>

        <div class="template_holder">
            <div class="template">
                <p class="template_name">Software Building</p>
                <p class="template_info">Software Creation Project Management</p>
                <button onclick="dashboard()">Select</button>
            </div>
        </div>-->
    </div>

    <?php require "project-list.php"; ?>
    </center>

    <?php require "hidden.php";?>
    <?php require "script_temp.php";?>
    <script>
        function exsistingProject(){
            var msg = "<?php echo $msg;?>";

            if(msg != "none"){
            swal.fire(msg);
            }
        }

        $(document).ready(function(){
            exsistingProject();
        })

        setInterval(function(){
            myTeamProjectList();
        }, 10000);
    </script>
</body>
</html>