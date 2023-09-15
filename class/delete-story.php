<?php

session_start();
$profile_name = $_SESSION['user'];
$productId = $_GET['prodid'];

if(isset($profile_name)){
    require_once "class.php";

    $story = new FlowPlan;
    $delete_story = $story->deleteStory($productId);
    
    echo json_encode($delete_story);


}
else{
    header("Location:\index.php");
}