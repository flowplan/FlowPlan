<?php

session_start();
$profile_name = $_SESSION['user'];
$sprintNum = $_GET['sprintNum'];
$projId = $_GET['projId'];
$dueTime = $_GET['due'];

if(isset($profile_name)){
    require_once "class.php";

    $project = new FlowPlan;
    $setSprintTimer = $project->setTimer($projId, $sprintNum, $dueTime);
    
    echo json_encode($setSprintTimer);


}
else{
    header("Location:\index.php");
}