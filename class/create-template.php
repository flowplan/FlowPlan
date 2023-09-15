<?php
session_start();
$profile_name = $_SESSION['user'];
$profile_image = $_SESSION['image'];
$profile_email = $_SESSION['email'];

$project_name = $_GET["project"];
$template = $_GET["temp"];
$mode = $_GET["mode"];
$id = $_GET["hidden"];

$a = str_replace([':', '\\', '/', '*'], '', $project_name);
$newProject = str_replace("'", "&apos;",$a);


if (isset($template) && isset($mode) && isset($profile_name)) {
    # code...
    require_once "class.php";
    $create = new flowPlan;
    $new_proj = $create->create_project($template, $mode, $newProject, $id, $profile_name, $profile_image, $profile_email);

    if ($new_proj) {
        echo json_encode($new_proj);
    }
    /*else
    {
        echo "data error";
        json_encode($new_proj);
    }*/
}
else
{
    header("Location:\index.php");
}