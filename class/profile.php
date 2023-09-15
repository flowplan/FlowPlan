<?php

$username = $_GET["name"];
$mode = $_GET["mode"];

if (isset($username) || isset($mode)) {
    # code...
    require_once "class.php";

    $setInfo = new flowPlan;
    $data = $setInfo->profile($username, $mode);

    echo json_encode($data);
}
else
{
    header("Location:\index.php");
}