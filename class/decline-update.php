<?php

session_start();
$profile_name = $_SESSION['user'];
$username = $_GET['user'];
$log = $_GET['id'];
$taskId = $_GET['taskid'];
$comment = $_GET['comment'];

if(isset($profile_name)){
    require_once "class.php";

    $report = new FlowPlan;
    $accept = $report->DeclineLog($log, $taskId, $comment, $username);
    
    echo json_encode($accept);


}
else{
    header("Location:\index.php");
}