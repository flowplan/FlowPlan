<?php

session_start();
$profile_name = $_SESSION['user'];
$projectId = $_GET['projId'];

if(isset($profile_name)){
    require_once "class.php";

    $project = new FlowPlan;
    $delete_project = $project->abortProject($projectId);
    
    echo json_encode($delete_project);


}
else{
    header("Location:\index.php");
}