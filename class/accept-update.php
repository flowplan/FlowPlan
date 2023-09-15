<?php

session_start();
$profile_name = $_SESSION['user'];
$user = $_GET['user'];
$log = $_GET['id'];
$taskId = $_GET['taskId'];

if(isset($profile_name)){
    require_once "class.php";

    $report = new FlowPlan;
    $accept = $report->AcceptLog($log, $taskId, $user);
    
    echo json_encode($accept);


}
else{
    header("Location:\index.php");
}