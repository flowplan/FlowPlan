<?php

session_start();

$_SESSION["projectId"] = $_GET["projId"];
$_SESSION["roleId"] = 1;
$_SESSION["color"]="black";
$_SESSION["teamId"] = "null";


$profile_name = $_SESSION['user'];
$profile_image = $_SESSION['image'];
//$profile_mode = $_SESSION['mode'];
$myProjectId = $_SESSION['projectId'];
$email = $_SESSION['email'];

if(isset($profile_name)){
    require_once "class/class.php";

    $update = new FlowPlan;
    $updateTeam = $update->updateScrumMaster($profile_name, $profile_image, $email, $myProjectId);
    
    echo json_encode($updateTeam);
    header("Location:dashboard.php");

}
else{
    header("Location:\index.php");
}

#echo $_SESSION["projectId"];

#header("Location:dashboard.php");