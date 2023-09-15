<?php

session_start();
$profile_name = $_SESSION['user'];
$projName = $_GET['projectName'];
$projId = $_GET['projId'];

$a = str_replace([':', '\\', '/', '*'], '', $projName);
$newProject = str_replace("'", "",$a);

if(isset($profile_name)){
    require_once "class.php";

    $project = new FlowPlan;
    $edit_project = $project->editProject($newProject, $projId);
    
    echo json_encode($edit_project);


}
else{
    header("Location:\index.php");
}