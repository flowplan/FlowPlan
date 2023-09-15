<?php

session_start();
unset($_SESSION['projectId']);
header("Location:/template.php");
?>