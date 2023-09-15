<?php

session_start();
$profile_name = $_SESSION['user'];
$teamId = $_GET['teamId'];
$roleName = $_GET['role'];
$otherRole = $_GET['otherRole'];


if(isset($profile_name)){
    require_once "class.php";

    $role = new FlowPlan;
    $edit_role = $role->editRole($teamId, $roleName, $otherRole);
    
    echo json_encode($edit_role);


}
else{
    header("Location:\index.php");
}