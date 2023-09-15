<?php

session_start();
$profile_name = $_SESSION['user'];
$email = $_SESSION["email"];
$projectId = $_GET['projId'];

if(isset($profile_name)){
    require_once "class.php";

    $report = new FlowPlan;
    $changeNotify = $report->finished_task($projectId, $email);
    
    echo json_encode($changeNotify);


}
else{
    header("Location:\index.php");
}