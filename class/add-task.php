<?php

session_start();
$profile_name = $_SESSION['user'];
$productId = $_GET['prodid'];
$projectId = $_GET['projid'];
$Thetask = $_GET['task'];
$define = $_GET['define'];
$time = $_GET['time'];

$a = str_replace([':', '\\', '/', '*'], '', $Thetask);
$b = str_replace([':', '\\', '/', '*'], '', $define);
$Vision = str_replace("'", "&apos;",$a);
$Mission = str_replace("'", "&apos;",$b);

if(isset($profile_name))
{
    require_once "class.php";
    $task = new flowPlan;
    $addTask = $task->createTask($productId, $projectId, $Vision, $Mission, $time);
    
    if($addTask){echo json_encode($addTask);}
    else{echo json_encode($addTask);}
}
else
{
    header("Location:\index.php");
}