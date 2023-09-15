<?php

session_start();
$profile_name = $_SESSION['user'];
$taskId = $_GET['taskId'];

if(isset($profile_name)){
    require_once "class.php";

    $task = new FlowPlan;
    $edit_task = $task->viewTrigger($taskId);
    
    echo json_encode($edit_task);


}
else{
    header("Location:\index.php");
}