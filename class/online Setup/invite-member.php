<?php

session_start();
$profile_name = $_SESSION['user'];
$projectId = $_GET['projectId'];
$email = $_GET['email'];
$projName = $_GET['projname'];

if(isset($profile_name))
{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $invalidEmail = "invalid email";
        echo json_encode($invalidEmail);
    }
    else{
        require_once "class.php";
        $member = new flowPlan;
        $invite = $member->inviteMember($projectId, $email, $projName);
        
        if($invite){
            echo json_encode($invite);

             //verify link
             $to = $email;
             $subject = "FlowPlan: Agile Scrum Project Management Simulation";
             $message = "<a href='https://flowplan.site'>Team Invitation</a><br>";
             //$message = "<a href='tender-firefly-85645.pktriot.net'>Team Invitation</a><br>";
             
             $message .= "<img src='https://flowplan.site/css/banner.png' style='width=80%; height:auto;'><br>";
             $message .= "<strong>".$profile_name . "</strong> is inviting you to join in their development team project. <br>";
             $message .= "Click the link above to proceed on the website.";
             $headers = "From: flowplan77@gmail.com \r\n";
             $headers .= "MIME-Version: 1.0"."\r\n";
             $headers .= "Content-type:text/html;charset=UTF-8". "\r\n";
 
             $result = mail($to, $subject, $message, $headers);
        }
        else{echo json_encode($invite);}
    }
}
else
{
    header("Location:\index.php");
}