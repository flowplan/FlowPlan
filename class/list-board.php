<?php

session_start();
$username = $_SESSION["user"];
$projId = $_GET["projId"];
$statusId = $_GET["status"];
$color = $_GET["color"];
$sprint = $_GET["sprint"];

if (isset($username)){
    require_once "class.php";
    $board = new flowPlan;
    $showBoard = $board->listBoard($projId, $statusId, $color, $sprint);
    
    echo json_encode($showBoard);
}
else {
    header("Location:\index.php");
}