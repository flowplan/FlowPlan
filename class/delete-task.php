<?php

session_start();
$profile_name = $_SESSION['user'];
$projectId = $_SESSION["projectId"];
$taskId = $_GET['taskId'];

if(isset($profile_name)){
    require_once "class.php";

    $task = new FlowPlan;
    $delete_task = $task->deleteTask($taskId, $projectId);
    
    echo json_encode($delete_task);


}
else{
    header("Location:\index.php");
}