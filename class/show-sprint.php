<?php

session_start();
$profile_name = $_SESSION['user'];
$projectId = $_GET['projId'];

if(isset($profile_name))
{
    require_once "class.php";
    $sprint = new flowPlan;
    $showSprint = $sprint->displaySprint($projectId);
    
    if($showSprint){echo json_encode($showSprint);}
    else{echo json_encode($showSprint);}
}
else
{
    header("Location:\index.php");
}