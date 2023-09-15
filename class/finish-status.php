<?php

session_start();
$profile_name = $_SESSION['user'];
$taskId = $_GET['taskId'];
$statusId = $_GET['status'];
$link = $_GET['link'];
$projectId = $_GET['projId'];

if(isset($profile_name)){
    require_once "class.php";

    if(filter_var($link, FILTER_VALIDATE_URL)){
        $status = new FlowPlan;
        $edit_status = $status->doneStatus($taskId, $statusId, $projectId, $profile_name, $link);
        
        echo json_encode($edit_status);  
    }
    else
    {
        $msg = "invalid";
        echo json_encode($msg);
    }


}
else{
    header("Location:\index.php");
}