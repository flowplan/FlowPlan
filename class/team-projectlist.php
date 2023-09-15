<?php

session_start();
$username = $_SESSION["user"];
$hidden = $_GET["hidden"];
$mode = $_GET["mode"];
$email = $_GET["email"];

if (isset($username)){
    require_once "class.php";
    $TeamProject = new flowPlan;
    $show = $TeamProject->listProjectInvite($hidden, $mode, $email);

    echo json_encode($show);
}
else {
    header("Location:\index.php");
}