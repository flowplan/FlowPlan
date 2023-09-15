<?php

$username = $_GET['username'];
$password = $_GET['password'];
$email = $_GET['email'];
$verify = md5(time().$username);

if(isset($username) == "" ||
   isset($password) == "" ||
   isset($email) == ""){
    header("Location:\index.php");
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    # code...
    $invalidEmail = "invalid email";
    echo json_encode($invalidEmail);
}
else {
    # code...
    require_once "class.php";
    $register_request = new flowPlan;
    $req = $register_request->register($username, $password, $email, $verify);

    if ($req) {
        //echo json_encode($result);
        
        if($req == "taken")
        {
            echo json_encode($req);
        }
        elseif ($req == "emailTaken") {
            echo json_encode($req);
        }
        else
        {
            //verify link
            $to = $email;
            $subject = "FlowPlan Email Verification";
            $message = "<a href='http://localhost/FlowPlan/verifyer.php?vkey=$verify'>Register Account</a>";
            $headers = "From: flowplan77@gmail.com \r\n";
            $headers .= "MIME-Version: 1.0"."\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8". "\r\n";

            $result = mail($to, $subject, $message, $headers);

            echo json_encode($req);
        }
    }
    else
    {
        echo "date error";
    }

}