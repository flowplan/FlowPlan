<?php

session_start();
$profile_name = $_SESSION['user'];
$taskId = $_GET['taskId'];
$statusId = $_GET['status'];
$projectId = $_GET['projId'];

if(isset($profile_name)){
    require_once "class.php";

    $status = new FlowPlan;
    $edit_status = $status->editStatus($taskId, $statusId, $projectId, $profile_name);
    
    echo json_encode($edit_status);


}
else{
    header("Location:\index.php");
}