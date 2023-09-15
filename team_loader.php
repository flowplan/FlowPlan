<?php

session_start();

$_SESSION["projectId"] = $_GET["projId"];
$_SESSION["teamId"] = $_GET["teamId"];
$_SESSION["roleId"] = $_GET["roleId"];
$_SESSION["color"] = $_GET["color"];

$profile_name = $_SESSION['user'];
$profile_image = $_SESSION['image'];
$profile_mode = $_SESSION['mode'];
$myProjectId = $_SESSION['projectId'];
$teamId = $_SESSION['teamId'];

#echo $_SESSION["roleId"];

if(isset($profile_name)){
    require_once "class/class.php";

    $update = new FlowPlan;
    $updateTeam = $update->updateTeam($profile_name, $profile_image, $teamId, $myProjectId);
    
    echo json_encode($updateTeam);
    header("Location:dashboard.php");

}
else{
    header("Location:\index.php");
}

#echo $_SESSION["projectId"].", ".$_SESSION["teamId"];

