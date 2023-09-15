<?php

session_start();
$username = $_SESSION["user"];
$projectId = $_SESSION['projectId'];
$profile_email = $_SESSION['email'];



if(isset($username) && isset($projectId) && isset($profile_email)){
    require_once "class.php";
    $isMember = new flowPlan;
    $result = $isMember->isMember($projectId, $profile_email, $username);
    
    echo json_encode($result);
}

else if($_SESSION["message"] == "back to project")
{
    echo json_encode("project");
}

else if($_SESSION["message"] == "you are logout"){
    echo json_encode("out");
}

else{
    header("Location:\index.php");
}