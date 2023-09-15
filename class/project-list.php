<?php

session_start();
$username = $_SESSION["user"];
$hidden = $_GET["hidden"];
$mode = $_GET["mode"];

if (isset($username)){
    require_once "class.php";
    $showProject = new flowPlan;
    $show = $showProject->listProject($hidden, $mode);

    echo json_encode($show);
}
else {
    header("Location:\index.php");
}