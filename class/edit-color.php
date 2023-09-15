<?php

session_start();
$profile_name = $_SESSION['user'];
$teamId = $_GET['teamId'];
$projId = $_GET['projId'];
$colorName = $_GET['color'];
$teamName = $_GET['teamName'];


if(isset($profile_name)){
    require_once "class.php";

    $color = new FlowPlan;
    $edit_color = $color->editColor($teamId, $projId, $colorName, $teamName);
    
    echo json_encode($edit_color);


}
else{
    header("Location:\index.php");
}