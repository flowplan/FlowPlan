<?php

//SELECT teamName,COUNT(*) FROM `task` GROUP BY teamName
//session_start();
//$myProjectId = $_SESSION['projectId'];
require_once "conn.php";

$workload = "SELECT teamName,COUNT(*) AS countLoad FROM `task` WHERE projectId='$myProjectId' GROUP BY teamName";
#echo $workload."<br>";
$sql4 = $conn->prepare($workload);
$sql4->execute();
$data = $sql4->fetchAll(PDO::FETCH_ASSOC);

$vale = json_encode($data);
#echo $vale;

$array = json_decode($vale, true);

$workload = "";
foreach($array as $x){
    $workload.="['".$x['teamName']."', ".$x['countLoad']."], ";
}

#echo $workload;