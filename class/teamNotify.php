<?php

session_start();
$profile_name = $_SESSION['user'];
$projectId = $_GET['projId'];
$email = $_SESSION["email"];

if(isset($profile_name)){
    require_once "class.php";

    $report = new FlowPlan;
    $changeNotify = $report->teamNotify($profile_name, $projectId, $email);
    
    echo json_encode($changeNotify);


}
else{
    header("Location:\index.php");
}