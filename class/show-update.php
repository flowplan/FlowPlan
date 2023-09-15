<?php

session_start();
$profile_name = $_SESSION['user'];
$projectId = $_GET['projId'];

if(isset($profile_name))
{
    require_once "class.php";
    $update = new flowPlan;
    $update_show = $update->displayUpdate($projectId);
    
    if($update_show){echo json_encode($update_show);}
    else{echo json_encode($update_show);}
}
else
{
    header("Location:\index.php");
}