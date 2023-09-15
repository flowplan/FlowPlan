<?php

$username = $_GET["user"];
$password = $_GET["pass"];

if (isset($username) !== "" && isset($password) !=="") {
    # code...
    require_once "class.php";
    $login = new flowPlan;
    $data = $login->login($username, $password);

    if ($data > 0) {
        # code...
        session_start();
        $_SESSION['user'] = $username;
        $_SESSION['mode'] = "basic";
        echo json_encode($data);
    }
    elseif ($data == "not verified") {
        echo json_encode($data);
    }
    else{
        echo json_encode($data);
    }

}
else {
    # code...
    header("Location:\index.php");
}