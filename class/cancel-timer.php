<?php

session_start();
$profile_name = $_SESSION['user'];
$projId = $_GET['projId'];

if(isset($profile_name)){
    require_once "class.php";

    $project = new FlowPlan;
    $setSprintTimer = $project->cancelTimer($projId);
    
    echo json_encode($setSprintTimer);


}
else{
    header("Location:\index.php");
}