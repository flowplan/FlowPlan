<?php

session_start();
$profile_name = $_SESSION['user'];
$proj = $_GET['id'];

if (isset($profile_name)) {
    # code...
    require_once "class.php";
    $setInfo = new flowPlan;
    $data = $setInfo->projInfo($proj);

    echo json_encode($data);
}
else
{
    header("Location:\index.php");
}