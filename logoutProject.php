<?php
session_start();
$msg = $_GET["msg"];
unset($_SESSION['projectId']);
$_SESSION['message'] = "back to project";

if(isset($msg)){
    header("Location:/FlowPlan/template.php?msg=$msg");
}
else{
    header("Location:/FlowPlan/template.php");
}
//Location:/template.php
//Location:/FlowPlan/template.php

?>