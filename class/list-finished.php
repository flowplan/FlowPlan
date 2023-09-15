<?php

session_start();
$username = $_SESSION["user"];
$projId = $_GET["projId"];

if (isset($username)){
    require_once "class.php";
    $task = new flowPlan;
    $finished_task = $task->finishedTask($projId);
    
    echo json_encode($finished_task);
}
else {
    header("Location:\index.php");
}