<?php
$vkey = $_GET['vkey'];

if (isset($vkey)) {
    # code...
    require_once "class/class.php";
    $vkeySet = new FlowPlan;
    $verified = $vkeySet->verify($vkey);

    if($verified)
    {
        header("Location:\index.php");
    }
    else
    {header("Location:\index.php");}
}
else {
    header("Location:\index.php");
}