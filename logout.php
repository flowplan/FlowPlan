<?php

session_start();
unset($_SESSION['user']);
unset($_SESSION['image']);
unset($_SESSION['mode']);
unset($_SESSION['projectId']);
$_SESSION['message'] = "you are logout";
header("Location:\index.php");
?>