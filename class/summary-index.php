<?php
session_start();

require_once "conn.php";

//Project
$qAllProjects = "SELECT * FROM projects";
$allProjectsSql = $conn->prepare($qAllProjects);
$allProjectsSql->execute();
$allProjectsCount = $allProjectsSql->rowCount();

//Finished
$qAllFinished = "SELECT * FROM task WHERE statusId=3";
$allFinished = $conn->prepare($qAllFinished);
$allFinished->execute();
$allFinishedCount = $allFinished->rowCount();

//Stories
$aAllProduct = "SELECT * FROM product";
$allProduct = $conn->prepare($aAllProduct);
$allProduct->execute();
$allProductCount = $allProduct->rowCount();

//User
$qAllUser = "SELECT * FROM googleaccounts";
$allUser = $conn->prepare($qAllUser);
$allUser->execute();
$allUserCount = $allUser->rowCount();

$summaryArray = array(
                      "allProjects"=>$allProjectsCount,
                      "allFinished"=>$allFinishedCount,
                      "allProduct"=>$allProductCount,
                      "allUser"=>$allUserCount
                    );

echo json_encode($summaryArray);
?>