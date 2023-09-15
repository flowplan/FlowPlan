<?php
session_start();
$profile_name = $_SESSION['user'];
$myProjectId = $_GET['projId'];
$story = $_GET["story"];
$obj = $_GET["obj"];

$a = str_replace([':', '\\', '/', '*'], '', $story);
$b = str_replace([':', '\\', '/', '*'], '', $obj);
$Vision = str_replace("'", "&apos;",$a);
$Mission = str_replace("'", "&apos;",$b);

if (isset($profile_name)) {
    # code...
    require_once "class.php";
    $create = new flowPlan;
    $story_new = $create->createStories($myProjectId, $Vision, $Mission);

    if ($story_new) {
        echo json_encode($story_new);
    }
    else
    {
        echo "data error";
        echo json_encode($story_new);
    }
}
else
{
    header("Location:\index.php");
}