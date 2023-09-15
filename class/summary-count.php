<?php
session_start();
$myProjectId = $_SESSION['projectId'];

require_once "conn.php";

$qTask_pending = "SELECT * FROM task WHERE projectId=$myProjectId AND statusId=4";
$qTask_toDo = "SELECT * FROM task WHERE projectId=$myProjectId AND statusId=1";
$qTask_inProgress = "SELECT * FROM task WHERE projectId=$myProjectId AND statusId=2";
$qTask_done = "SELECT * FROM task WHERE projectId=$myProjectId AND statusId=3";

$sql4 = $conn->prepare($qTask_pending);
$sql1 = $conn->prepare($qTask_toDo);
$sql2 = $conn->prepare($qTask_inProgress);
$sql3 = $conn->prepare($qTask_done);

$sql4->execute();
$sql1->execute();
$sql2->execute();
$sql3->execute();

$cTask_pending = $sql4->rowCount();
$cTask_toDo = $sql1->rowCount();
$cTask_inProgress = $sql2->rowCount();
$cTask_done = $sql3->rowCount();


$qPrio_pending = "SELECT * FROM product WHERE projectId=$myProjectId AND priorityId=4";
$qPrio_toDo = "SELECT * FROM product WHERE projectId=$myProjectId AND priorityId=1";
$qPrio_inProgress = "SELECT * FROM product WHERE projectId=$myProjectId AND priorityId=2";
$qPrio_done = "SELECT * FROM product WHERE projectId=$myProjectId AND priorityId=3";

$sqlp4 = $conn->prepare($qPrio_pending);
$sqlp1 = $conn->prepare($qPrio_toDo);
$sqlp2 = $conn->prepare($qPrio_inProgress);
$sqlp3 = $conn->prepare($qPrio_done);

$sqlp4->execute();
$sqlp1->execute();
$sqlp2->execute();
$sqlp3->execute();

$cPrio_unset = $sqlp4->rowCount();
$cPrio_should = $sqlp1->rowCount();
$cPrio_could = $sqlp2->rowCount();
$cPrio_maybe = $sqlp3->rowCount();

$qReport = "SELECT * FROM update_logs WHERE projectId=$myProjectId";
$qReportSql = $conn->prepare($qReport);
$qReportSql->execute();
$ReportCount = $qReportSql->rowCount();

$qReportNew = "SELECT * FROM update_logs WHERE projectId=$myProjectId AND confirmId=0";
$qReportNewSql = $conn->prepare($qReportNew);
$qReportNewSql->execute();
$ReportNewCount = $qReportNewSql->rowCount();

$qtask = "SELECT * FROM task WHERE projectId=$myProjectId";
$qtaskSql = $conn->prepare($qtask);
$qtaskSql->execute();
$taskCount = $qtaskSql->rowCount();

$qteam = "SELECT * FROM team WHERE projectId=$myProjectId AND inviteValue=1";
$qteamSql = $conn->prepare($qteam);
$qteamSql->execute();
$teamCount = $qteamSql->rowCount();

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

//Members Notif
$qReportResign = "SELECT * FROM team WHERE projectId=$myProjectId AND inviteValue=1 AND request_Indicator=1";
$qReportResignSql = $conn->prepare($qReportResign);
$qReportResignSql->execute();
$ReportResignCount = $qReportResignSql->rowCount();

$summaryArray = array("pending"=>$cTask_pending,
                      "todo"=>$cTask_toDo,
                      "inprogress"=>$cTask_inProgress,
                      "done"=>$cTask_done,
                      "should"=>$cPrio_should,
                      "could"=>$cPrio_could,
                      "maybe"=>$cPrio_maybe,
                      "unset"=>$cPrio_unset,
                      "report"=>$ReportCount,
                      "newReport"=>$ReportNewCount,
                      "created"=>$taskCount,
                      "team"=>$teamCount,
                      "allProjects"=>$allProjectsCount,
                      "allFinished"=>$allFinishedCount,
                      "allProduct"=>$allProductCount,
                      "allUser"=>$allUserCount,
                      "resign"=>$ReportResignCount
                    );

echo json_encode($summaryArray);
?>