<?php

session_start();
$profile_name = $_SESSION['user'];
$id = $_GET['teamId'];

if(isset($profile_name)){
    require_once "class.php";

    $decline = new FlowPlan;
    $declineProject = $decline->declineProject($id);
    
    echo json_encode($declineProject);


}
else{
    header("Location:\index.php");
}