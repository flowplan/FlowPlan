<?php

session_start();
$profile_name = $_SESSION['user'];
$email = $_GET['email'];

if(isset($profile_name)){
    require_once "class.php";

    $project = new FlowPlan;
    $isNewAccount = $project->isNew($email);
    
    echo json_encode($isNewAccount);


}
else{
    header("Location:\index.php");
}