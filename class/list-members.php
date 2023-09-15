<?php

session_start();
$username = $_SESSION["user"];
$id = $_GET["projectId"];

if (isset($username)){
    require_once "class.php";
    $team = new flowPlan;
    $showTeam = $team->listMembers($id);
    
    echo json_encode($showTeam);
}
else {
    header("Location:\index.php");
}




