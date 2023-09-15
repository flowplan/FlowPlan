<?php

session_start();
$username = $_SESSION["user"];
$productId = $_GET["prodid"];
$projectId = $_GET["projid"];

if (isset($username)){
    require_once "class.php";
    $showTask = new flowPlan;
    $show = $showTask->taskList($productId, $projectId);

    echo json_encode($show);
}
else {
    header("Location:\index.php");
}