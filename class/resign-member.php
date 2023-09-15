<?php

session_start();
$profile_name = $_SESSION['user'];
$teamId = $_GET['teamId'];

if(isset($profile_name)){
    require_once "class.php";

    $team = new FlowPlan;
    $delete_team = $team->resignMember($teamId);
    
    echo json_encode($delete_team);


}
else{
    header("Location:\index.php");
}