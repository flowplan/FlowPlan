<?php

session_start();
$profile_name = $_SESSION['user'];
$projectId = $_SESSION['projectId'];
$sprintNumber = $_GET['sprint'];

if(isset($profile_name))
{
    require_once "class.php";
    $sprint = new flowPlan;
    $deleteSprint = $sprint->removeSprint($sprintNumber, $projectId);
    
    if($deleteSprint){echo json_encode($deleteSprint);}
    else{echo json_encode($deleteSprint);}
}
else
{
    header("Location:\index.php");
}