<?php

session_start();
$profile_name = $_SESSION['user'];
$productId = $_GET['prodId'];
$as_a = $_GET['asA'];
$iWantTo = $_GET['iWantTo'];
$soThat = $_GET['soThat'];
$status = $_GET['status'];
$sprint = $_GET['sprint'];
$priority = $_GET['priority'];
$sprint_running = $_GET['run_sprint'];
/*
echo $productId."<br>";
echo $as_a."<br>";
echo $status."<br>";
echo $sprint."<br>";
echo $priority."<br><br>";
echo $iWantTo."<br>";
echo $soThat."<br>";*/

$a = str_replace([':', '\\', '/', '*'], '', $iWantTo);
$b = str_replace([':', '\\', '/', '*'], '', $soThat);
$Vision = str_replace("'", "&apos;",$a);
$Mission = str_replace("'", "&apos;",$b);
//echo $Vision."<br>";
//echo $Mission."<br>";

if(isset($profile_name)){
    require_once "class.php";

    $story = new FlowPlan;
    $edit_story = $story->editStory($productId, $as_a, $Vision, $Mission, $sprint, $status, $priority, $sprint_running);
    
    echo json_encode($edit_story);


}
else{
    header("Location:\index.php");
}