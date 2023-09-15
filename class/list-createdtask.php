<?php

session_start();
$username = $_SESSION["user"];
$projId = $_GET["projId"];

if (isset($username)){
    require_once "class.php";
    $task = new flowPlan;
    $created_task = $task->createdtask($projId);
    
    echo json_encode($created_task);
}
else {
    header("Location:\index.php");
}