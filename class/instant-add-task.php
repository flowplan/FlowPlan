<?php

session_start();
$profile_name = $_SESSION['user'];
$currentSprint = $_GET['currentSprint'];
$projectId = $_GET['projid'];
$Thetask = $_GET['task'];
$define = $_GET['define'];
$time = $_GET['time'];

if(isset($profile_name))
{
    require_once "class.php";
    $task = new flowPlan;
    $addTask = $task->instantCreateTask($currentSprint, $projectId, $Thetask, $define, $time);
    
    if($addTask){echo json_encode($addTask);}
    else{echo json_encode($addTask);}
}
else
{
    header("Location:\index.php");
}