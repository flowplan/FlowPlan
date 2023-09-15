<?php

session_start();
$username = $_SESSION["user"];
$sprint = $_GET["sprint"];
$id = $_GET["id"];

if (isset($username)){
    require_once "class.php";
    $showStory = new flowPlan;
    $show = $showStory->showSprintList($id, $sprint);
    
    echo json_encode($show);
}
else {
    header("Location:\index.php");
}




