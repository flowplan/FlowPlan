<?php

session_start();
$profile_name = $_SESSION['user'];
$taskId = $_GET['taskId'];
$member = $_GET['member'];
$colorName = $_GET['color'];
$projectId = $_SESSION['projectId'];
$profile_email = $_SESSION['email'];


if(isset($profile_name)){
    require_once "class.php";

    $owner = new FlowPlan;
    $edit_owner = $owner->editOwner($taskId, $member, $colorName, $projectId, $profile_email);
    
    echo json_encode($edit_owner);


}
else{
    header("Location:\index.php");
}