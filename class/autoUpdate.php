<?php

session_start();
$profile_name = $_SESSION['user'];
$projectId = $_GET['projId'];
$profile_email = $_SESSION['email'];

if(isset($profile_name)){
    require_once "class.php";

    $auto = new FlowPlan;
    $auto_edit = $auto->autoUpdate($projectId, $profile_email);
    
    echo json_encode($auto_edit);


}
else{
    header("Location:\index.php");
}