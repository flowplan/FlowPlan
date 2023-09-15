<?php

session_start();
$profile_name = $_SESSION['user'];
$projectId = $_GET['projId'];

if(isset($profile_name))
{
    require_once "class.php";
    $sprint = new flowPlan;
    $addSprint = $sprint->createsprint($projectId);
    
    if($addSprint){echo json_encode($addSprint);}
    else{echo json_encode($addSprint);}
}
else
{
    header("Location:\index.php");
}