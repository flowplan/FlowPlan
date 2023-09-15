<?php

session_start();
$username = $_SESSION["user"];
$projId = $_GET["projId"];
$email = $_GET["email"];

if (isset($username)){
    require_once "class.php";
    $isMember = new flowPlan;
    $result = $isMember->isMember($projId, $email, $username);
    
    echo json_encode($result);
}
else {
    header("Location:\index.php");
}