<?php

session_start();
$username = $_SESSION["user"];
$owner = $_GET["name"];
$id = $_GET["id"];
$filterSprints = $_GET['filterSprints'];
$filterPriorities = $_GET['filterPriorities'];
$filterStatus = $_GET['filterStatus'];

if($filterSprints == ""){
    $filterSprints = "All";
}

if (isset($username)){
    require_once "class.php";
    $showStory = new flowPlan;
    $show = $showStory->showStories($id, $filterSprints, $filterPriorities, $filterStatus);

    echo json_encode($show);
}
else {
    header("Location:\index.php");
}