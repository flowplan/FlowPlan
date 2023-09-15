<?php
session_start();
$username = $_SESSION['user'];
$teamId = $_GET["teamId"];

if (isset($username)) {
    # code...
    require_once "class.php";

    $setInfo = new flowPlan;
    $data = $setInfo->teamIDDynamic($teamId);

    echo json_encode($data);
}
else
{
    header("Location:\index.php");
}