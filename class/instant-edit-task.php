<?php

session_start();
$profile_name = $_SESSION['user'];
$projectId = $_SESSION["projectId"];
$taskName = $_GET['task'];
$TargetName = $_GET['define'];
$taskTime = $_GET['time'];
$taskId = $_GET['taskId'];
$comment = $_GET['comment'];
/*
echo $productId."<br>";
echo $as_a."<br>";
echo $iWantTo."<br>";
echo $soThat."<br>";
echo $status."<br>";
echo $sprint."<br>";
echo $priority."<br><br>";*/

$a = str_replace([':', '\\', '/', '*'], '', $taskName);
$b = str_replace([':', '\\', '/', '*'], '', $TargetName);
$Vision = str_replace("'", "&apos;",$a);
$Mission = str_replace("'", "&apos;",$b);

if(isset($profile_name)){
    require_once "class.php";

    $task = new FlowPlan;
    $edit_task = $task->editTask($Vision, $Mission, $taskTime, $taskId, $comment, $projectId);
    
    echo json_encode($edit_task);


}
else{
    header("Location:\index.php");
}