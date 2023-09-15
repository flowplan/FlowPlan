<?php

class flowPlan{
    public function login($user, $password){
        require_once "conn.php";

        //find account
        $validUser = $conn->prepare("SELECT * FROM accounts WHERE username=:username AND password=:password");
        $validUser->execute(array('username' => $user, 'password'=>$password));
        $countUser = $validUser->rowCount();
        //check verify
        $validverify = $conn->prepare("SELECT * FROM accounts WHERE username=:username AND codeID = 1");
        $validverify->execute(array('username' => $user));
        $countverify = $validverify->rowCount();

        if($countUser == 0){
            return $countUser;
        }
        elseif ($countverify == 0) {
            $msg = "not verified";
            return $msg;
        }
        {
            return $countUser;
        }
    }

    public function verify($vkey){
        //find vkey
        require_once "conn.php";
        $validUser = $conn->prepare("SELECT * FROM accounts WHERE CODE=:vkey");
        $validUser->execute(array('vkey'=>$vkey));
        $countUser = $validUser->rowCount();

        if($countUser == 1)
        {
            $sql = $conn->prepare("UPDATE accounts SET codeID=1 WHERE CODE='".$vkey."'");
            $sql->execute();
        }
        else
        {
            $msg = "verfied";
            return $msg;
        }
    }

    public function register($user, $password, $email, $verify){
        require_once "conn.php";
        
        //Validate User
        $validUser = $conn->prepare("SELECT * FROM accounts WHERE username=:user");
        $validUser->execute(array('user' => $user));
        $countUser = $validUser->rowCount();

        //Validate User
        $validEmail = $conn->prepare("SELECT * FROM accounts WHERE email=:email");
        $validEmail->execute(array('email' => $email));
        $countEmail = $validEmail->rowCount();

        if ($countUser == 0) {
            # code...
            if($countEmail == 0){
                //Add User
                $addUser = "INSERT INTO accounts (username, password, email, Code) VALUES (:user, :pass, :email, :code)";
                $sqlset = $conn->prepare($addUser);
                $sqlsetTo = $sqlset->execute(array(":user"=>$user, ":pass"=>$password, ":email"=>$email, ":code"=>$verify));
                return $sqlsetTo;
            }
            else
            {
                $msg = "emailTaken";
                return $msg;
            }
        }
        else
        {
            $msg = "taken";
            return $msg;
        }
    }

    public function google_sign_in($user, $email, $image, $locale){
        require_once "conn.php";

        //Validate user
        $validUser = $conn->prepare("SELECT * FROM googleaccounts WHERE email=:email");
        $validUser->execute(array('email' => $email));
        $countUser = $validUser->rowCount();

        if ($countUser == 0){
            //Add User
            $addUser = "INSERT INTO googleaccounts (name, email, image, locale) VALUES (:user, :email, :image, :locale)";
            $sqlset = $conn->prepare($addUser);
            $sqlsetTo = $sqlset->execute(array(":user"=>$user, ":email"=>$email, ":image"=>$image, ":locale"=>$locale));
            return $sqlsetTo;
        }
        else {
            # code...
            $query = "UPDATE googleaccounts SET name='$user' WHERE email='$email'";
            $edit = $conn->prepare($query);
            $sqlset = $edit->execute();
            return $countUser;
        }
    }

    public function profile($profile_name, $mode){
        require_once "conn.php";
        $qMode = "";
        if($mode == "basic"){
            $qMode = "SELECT * FROM accounts WHERE username='$profile_name'";
        }
        if($mode == "google"){
            $qMode = "SELECT * FROM googleaccounts WHERE name='$profile_name'";
        }

        //echo "query: ". $qMode;
        $sql_profile = $conn->prepare($qMode);
        $sql_profile->execute();
        $sql_profile = $sql_profile->fetchAll(PDO::FETCH_ASSOC);
        return $sql_profile;
    }


    public function create_project($temp, $mode, $project, $id, $profile_name, $profile_image, $profile_email){
        require_once "conn.php";
        //echo $project;
        //validate project
        //check mode
        if($mode == "basic"){
            $qMode = "SELECT * FROM projects WHERE userId=$id AND project='$project'";
        }
        if($mode == "google"){
            $qMode = "SELECT * FROM projects WHERE googleId=$id AND project='$project'";
        }

        $check = $conn->prepare($qMode);
        $check->execute();
        $countProject = $check->rowCount();

        if ($countProject == 0) {
            # code...
            $user = "";
            //validate mode
            if($mode == "basic"){
                $usermode="userId";
            }
            if($mode == "google"){
                $usermode="googleId";
            }

            $addProject = "INSERT INTO projects (project, $usermode) VALUES ('$project', $id)";
            
            //echo "Query: ". $project;
            //add project
            $sqlset = $conn->prepare($addProject);
            $sqlsetTo = $sqlset->execute();
            #array(":project"=>$project, ":id"=>$id)
            //echo json_encode($sqlsetTo);

            //find projectID
            $findProjectID = "SELECT * FROM projects WHERE googleId='$id' AND project='$project'";
            $findProj = $conn->prepare($findProjectID);
            $findProj->execute();
            $data = $findProj->fetch(PDO::FETCH_ASSOC);
            extract($data);

            $exProjectId = $projectId;

            //Default Sprint
            $qNaSprint = "INSERT INTO sprints (sprintNumber, sprintTime, projectId) VALUES (0, 627, :id)";
            $addSprint = $conn->prepare($qNaSprint);
            $sqlsetTo = $addSprint->execute(array(":id"=>$exProjectId));

            $qNaSprint1 = "INSERT INTO sprints (sprintNumber, sprintTime, projectId) VALUES (1, 627, :id)";
            $addSprint1 = $conn->prepare($qNaSprint1);
            $sqlsetTo1 = $addSprint1->execute(array(":id"=>$exProjectId));

            //create TeamMember
            $addTeam = "INSERT INTO team (teamName, emailAddress, image, roleId, projectId, inviteValue, project) VALUES ('$profile_name', '$profile_email', '$profile_image', 1, '$exProjectId', 1, '$project')";
            #echo $addTeam;
            $team = $conn->prepare($addTeam);
            $teamTo = $team->execute();

            return $sqlsetTo;
        }
        elseif($countProject == 1) {
            $msg = "taken";
            return $msg;
        }
    }

    public function listProject($id, $mode){
        require_once "conn.php";
        $q="";
        if($mode == "basic"){
            $q = "SELECT * FROM projects WHERE userId=$id";
        }
        if($mode == "google"){
            $q = "SELECT * FROM projects WHERE googleId=$id";
        }
        //echo $q;
        $sql = $conn->prepare($q);
        $sql->execute();
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function projInfo($id){
        require_once "conn.php";
        $q = "SELECT * FROM projects WHERE projectId=:id";
        $sql = $conn->prepare($q);
        $sql->execute(array(":id"=>$id));
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function showStories($id, $filterSprints, $filterPriorities, $filterStatus){
        require_once "conn.php";
        /*
        SELECT product.ProductID, product.entity, product.Stories, product.Objective, product.sprint_number, product.projectId, priority.priority, status.status

        FROM ((product
        INNER JOIN priority on product.priorityId = priority.priorityId)
        INNER JOIN status ON product.statusId = status.statusId);
        */
        
        #create view to find this table
        $q = "SELECT product.ProductID, product.entity, product.Stories, product.Objective, product.sprint_number, product.projectId, priority.priority, status.status ";
        $q.= "FROM ((product INNER JOIN priority on product.priorityId = priority.priorityId) INNER JOIN status ON product.statusId = status.statusId) ";
        $q.= "WHERE product.projectId=:id";

        #filters
        $fsprint = " AND product.sprint_number='$filterSprints'";
        $fprio = " AND product.priorityId='$filterPriorities'";
        $fstatus = " AND product.statusId='$filterStatus'";

        if($filterSprints == "All"){$fsprint="";}
        if($filterPriorities == "All"){$fprio="";}
        if($filterStatus == "All"){$fstatus="";}

        #echo $q.$fsprint.$fprio.$fstatus;

        $sql = $conn->prepare($q.$fsprint.$fprio.$fstatus);
        $sql->execute(array(":id"=>$id));
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function showSprintList($id, $sprint){
        require_once "conn.php";
        
        $q = "SELECT * FROM story WHERE projectId=:id AND sprint_number=:sprint";
        $sql = $conn->prepare($q);
        $sql->execute(array(":id"=>$id, ":sprint"=>$sprint));
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);

        $sqlcount = $sql->rowCount();

        if($sqlcount == 0){
            $msg = "none";
            return $msg;
        }
        else
        {
            return $data;
        }

        echo $data;
    }

    public function createStories($id, $story, $obj){
        require_once "conn.php";
        
        //checking if there is exsisting sprint
        $q = "SELECT * FROM sprints WHERE projectId=:id AND sprintNumber=0";
        $ckSprint = $conn->prepare($q);
        $ckSprint->execute(array(':id' => $id));
        $countSprint = $ckSprint->rowCount();

        //count sprint
        $sprintCount = "SELECT * FROM sprints WHERE projectId=:id";
        $ckCount = $conn->prepare($sprintCount);
        $ckCount->execute(array(':id' => $id));
        $ckCountSprint = $ckCount->rowCount();

        $currentSprint = $ckCountSprint + 1;

        //add Story
        $qStoryCreate = "INSERT INTO product (Stories, entity, Objective, projectId, sprintId, sprint_number, priorityId, statusId) VALUES (:story, 'User', :obj, :id, :sprintNum, 0, 4, 4)";
        $sqlsetStory = $conn->prepare($qStoryCreate);
        $sqlsetTo = $sqlsetStory->execute(array(":story"=>$story, ":obj"=>$obj, ":id"=>$id, ":sprintNum"=>$currentSprint));
        return $sqlsetTo;

    }

    public function createTask($productId, $projectId, $theTask, $define, $time){
        require_once "conn.php";
        
        $qTaskCreate = "INSERT INTO task (taskName, targetName, taskTime, productId, projectId) VALUES (:taskName, :targetName, :taskTime, :productId, :projectId)";
        $sqlsetTask = $conn->prepare($qTaskCreate);
        $sqlsetTo = $sqlsetTask->execute(array(":taskName"=>$theTask, ":targetName"=>$define, ":taskTime"=>$time, ":productId"=>$productId, ":projectId"=>$projectId));
        return $sqlsetTo;
        echo $theTask."<br>";
        
    }

    public function instantCreateTask($currentSprint, $projectId, $theTask, $define, $time){
        require_once "conn.php";

        //checking if there is exsisting story in sprint
        $q = "SELECT * FROM product WHERE projectId=:id AND sprint_number=$currentSprint AND Stories='instantStoryMakerforInstantTask'";
        $ckSprint = $conn->prepare($q);
        $ckSprint->execute(array(':id' => $projectId));
        $countSprint = $ckSprint->rowCount();
        
        if($countSprint != 1){

            //create story
            $qStoryCreate = "INSERT INTO product (Stories, entity, Objective, projectId, sprintId, sprint_number, priorityId, statusId) VALUES ('instantStoryMakerforInstantTask', 'User', 'instantStoryMakerforInstantTask', $projectId, 1, $currentSprint, 4, 4)";
            $sqlsetStory = $conn->prepare($qStoryCreate);
            $sqlsetTo = $sqlsetStory->execute();

            //find product ID
            $findproduct = "SELECT ProductID FROM product WHERE projectId=:id AND sprint_number=$currentSprint AND Stories='instantStoryMakerforInstantTask'";
            $prepareProduct = $conn->prepare($findproduct);
            $prepareProduct->execute(array(':id' => $projectId));
            $data = $prepareProduct->fetch(PDO::FETCH_ASSOC);
            extract($data);

            $resultProduct = $ProductID;

            //execution
            $qTaskCreate = "INSERT INTO task (taskName, targetName, taskTime, productId, projectId) VALUES (:taskName, :targetName, :taskTime, :productId, :projectId)";
            $sqlsetTask = $conn->prepare($qTaskCreate);
            $sqlsetTo = $sqlsetTask->execute(array(":taskName"=>$theTask, ":targetName"=>$define, ":taskTime"=>$time, ":productId"=>$resultProduct, ":projectId"=>$projectId));
            return $sqlsetTo;

        }
        else
        {
            //find product ID
            $findproduct = "SELECT ProductID FROM product WHERE projectId=:id AND sprint_number=$currentSprint AND Stories='instantStoryMakerforInstantTask'";
            $prepareProduct = $conn->prepare($findproduct);
            $prepareProduct->execute(array(':id' => $projectId));
            $data = $prepareProduct->fetch(PDO::FETCH_ASSOC);
            extract($data);

            $resultProduct = $ProductID;

            //execution
            $qTaskCreate = "INSERT INTO task (taskName, targetName, taskTime, productId, projectId) VALUES (:taskName, :targetName, :taskTime, :productId, :projectId)";
            $sqlsetTask = $conn->prepare($qTaskCreate);
            $sqlsetTo = $sqlsetTask->execute(array(":taskName"=>$theTask, ":targetName"=>$define, ":taskTime"=>$time, ":productId"=>$resultProduct, ":projectId"=>$projectId));
            return $sqlsetTo;
        }
        
    }

    public function createsprint($id){
        require_once "conn.php";

        //checking if there is exsisting sprint
        $q = "SELECT * FROM sprints WHERE projectId=:id AND sprintNumber=0";
        $ckSprint = $conn->prepare($q);
        $ckSprint->execute(array(':id' => $id));
        $countSprint = $ckSprint->rowCount();

        if($countSprint == 0){
            $qNaSprint = "INSERT INTO sprints (sprintNumber, sprintTime, projectId) VALUES (0, 627, :id)";
            $sqlset = $conn->prepare($qNaSprint);
            $sqlsetTo = $sqlset->execute(array(":id"=>$id));
        }

        //count sprint
        $sprintCount = "SELECT * FROM sprints WHERE projectId=:id";
        $ckCount = $conn->prepare($sprintCount);
        $ckCount->execute(array(':id' => $id));
        $ckCountSprint = $ckCount->rowCount();

        #$currentSprint = $ckCountSprint + 1;

        if($ckCountSprint == 11){
            $msg = "limit";
            return $msg;
        }
        elseif($ckCountSprint >= 1){
            $currentSprint = $ckCountSprint;
            $que = "INSERT INTO sprints (sprintNumber, sprintTime, projectId) VALUES(:currentSprint, 627, :id)";
            $sqlsetSprint = $conn->prepare($que);
            $sqlset = $sqlsetSprint->execute(array(":currentSprint"=>$currentSprint, ":id"=>$id));
            return $sqlset;
        }
    }

    public function displaySprint($id){
        require_once "conn.php";

        $sprintCount = "SELECT * FROM sprints WHERE projectId=:id";
        $sprintOut = $conn->prepare($sprintCount);
        $sprintOut->execute(array(':id' => $id));
        $data = $sprintOut->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function displayUpdate($id){
        require_once "conn.php";

        $query = "SELECT * FROM update_logs WHERE projectId=:id ORDER BY confirmId ASC, ul_id DESC LIMIT 20";
        $updateLogs = $conn->prepare($query);
        $updateLogs->execute(array(':id' => $id));
        $data = $updateLogs->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function taskList($productId, $projectId){
        require_once "conn.php";

        $taskView = "SELECT * FROM task WHERE ProductID=:productId AND projectId=:projectId ORDER BY taskId ASC";
        $taskOut = $conn->prepare($taskView);
        $taskOut->execute(array(':productId' => $productId, ':projectId' => $projectId));
        $data = $taskOut->fetchAll(PDO::FETCH_ASSOC);

        $sqlcount = $taskOut->rowCount();

        if($sqlcount == 0){
            $msg = "none";
            return $msg;
        }
        else
        {
            return $data;
        }
    }

    public function editStory($productId, $as_a, $iWantTo, $soThat, $sprint, $status, $priority, $sprint_running){
        require_once "conn.php";
        $q1 = "UPDATE product SET Stories='$iWantTo', entity='$as_a', Objective='$soThat',";
        $qlast = " ProductID=$productId WHERE ProductID=$productId";
        $q2 = "";
        $q3 = "";
        $q4 = "";


        //check sprint number
        $find_query = "SELECT sprint_number FROM product WHERE ProductID=$productId";
        $findSprint = $conn->prepare($find_query);
        $findSprint->execute();
        $data = $findSprint->fetch(PDO::FETCH_ASSOC);
        extract($data);

        $sqlCheckSprint = $sprint_number;

            if($status != "")
            {
                $q2 = " statusId=$status,";
            }

            if($sprint != "")
            {
                $q3 = " sprint_number=$sprint,";
            }

            if($priority != "")
            {
                $q4 = " priorityId=$priority,";
            }
            
            $query = $q1.$q2.$q3.$q4.$qlast;

            $sprintnew = $sqlCheckSprint;
            //echo $find_query."<br>";
            //echo $sprintnew.$sprint."=".$sprint_running;
        if($sprint_running != $sprint){
            if($sprint_running == $sprintnew){
                $msg = "same";
                return $msg;
            }

            #echo $query."<br>";
            else{
                $edit = $conn->prepare($query);
                $sqlset = $edit->execute();
                return $sqlset;
            }
        }

        else{
            $msg = "same";
            return $msg;
        }

    }

    public function editTask($taskName, $TargetName, $taskTime, $taskId){
        require_once "conn.php";

        $query = "UPDATE task SET taskName='$taskName', targetName='$TargetName', taskTime='$taskTime' WHERE taskId=$taskId";

        #echo $query;

        $edit = $conn->prepare($query);
        $sqlset = $edit->execute();
        return $sqlset;
    }

    //delete task
    public function deleteTask($taskId){
        require_once "conn.php";

        $query = "DELETE FROM task WHERE taskId=:taskId";
        $delete = $conn->prepare($query);
        $sqlset = $delete->execute(array(":taskId"=>$taskId));
        return $sqlset;
    }

    public function deleteMember($teamId){
        require_once "conn.php";

        //find taskId information
        $finedTeam = "SELECT * FROM team WHERE teamId='$teamId'";


        $teamInfo = $conn->prepare($finedTeam);
        $teamInfo->execute();
        $data = $teamInfo->fetch(PDO::FETCH_ASSOC);
        extract($data);

        $exTeamName = $teamName;

        $editquery = "UPDATE task SET color='gray', teamName='unset' WHERE teamName='$exTeamName'";

        #echo $query;

        $updateTAsk = $conn->prepare($editquery);
        $sqlsetUpdate = $updateTAsk->execute();

        $query = "DELETE FROM team WHERE teamId=:teamId";
        $delete = $conn->prepare($query);
        $sqlset = $delete->execute(array(":teamId"=>$teamId));
        return $sqlset;
    }

    public function declineProject($id){
        require_once "conn.php";
        $query = "DELETE FROM team WHERE teamId=:teamId";
        $delete = $conn->prepare($query);
        $sqlset = $delete->execute(array(":teamId"=>$id));
        return $sqlset;
    }

    //delete story
    public function deleteStory($productId){
        require_once "conn.php";

        $queryTask = "DELETE FROM task WHERE productId=:productId";
        $queryStory = "DELETE FROM product WHERE ProductID=:productId";
        
        $deleteTask = $conn->prepare($queryTask);
        $deleteStory = $conn->prepare($queryStory);

        $sqlset = $deleteTask->execute(array(":productId"=>$productId));
        $sqlset2 = $deleteStory->execute(array(":productId"=>$productId));
        return $sqlset2;
    }

    //delete project
    public function abortProject($projectId){
        require_once "conn.php";

        $queryTeam = "DELETE FROM team WHERE projectId=:projectId";
        $queryTask = "DELETE FROM task WHERE projectId=:projectId";
        $queryUpdate_logs = "DELETE FROM update_logs WHERE projectId=:projectId";
        $querySprint = "DELETE FROM sprints WHERE projectId=:projectId";
        $queryStory = "DELETE FROM product WHERE projectId=:projectId";
        $queryProject = "DELETE FROM projects WHERE projectId=:projectId";
        
        $deleteTeam = $conn->prepare($queryTeam);
        $deleteTask = $conn->prepare($queryTask);
        $deleteUpdate_logs = $conn->prepare($queryUpdate_logs);
        $deleteSprint = $conn->prepare($querySprint);
        $deleteStory = $conn->prepare($queryStory);
        $deleteProject = $conn->prepare($queryProject);

        $sqlsetTeam = $deleteTeam->execute(array(":projectId"=>$projectId));
        $sqlsetTask = $deleteTask->execute(array(":projectId"=>$projectId));
        $sqlsetUpdate_logs = $deleteUpdate_logs->execute(array(":projectId"=>$projectId));
        $sqlsetSprint = $deleteSprint->execute(array(":projectId"=>$projectId));
        $sqlsetStory = $deleteStory->execute(array(":projectId"=>$projectId));
        $sqlsetProject = $deleteProject->execute(array(":projectId"=>$projectId));
        
        return $sqlsetProject;
    }

    //invite member
    public function inviteMember($projectId, $email, $projName){
        require_once "conn.php";
        
        //Validate Email REMEMBER THIS!!

        #$validUser = $conn->prepare("SELECT * FROM accounts WHERE username=:user");
        #$validUser->execute(array('user' => $user));
        #$countUser = $validUser->rowCount();

        //Validate Existing Invites
        $validEmail = $conn->prepare("SELECT * FROM team WHERE emailAddress=:email AND projectId=:projectId");
        $validEmail->execute(array('email' => $email, ":projectId"=>$projectId));
        $countEmail = $validEmail->rowCount();

            if($countEmail == 0){
                //Invite
                $addteam = "INSERT INTO team (emailAddress, projectId, project) VALUES (:email, :projectId, :projName)";
                $sqlset = $conn->prepare($addteam);
                $sqlsetTo = $sqlset->execute(array(":email"=>$email, ":projectId"=>$projectId, ":projName"=>$projName));
                return $sqlsetTo;
            }
            else
            {
                $msg = "emailTaken";
                return $msg;
            }
    }

    public function listProjectInvite($id, $mode, $email){
        require_once "conn.php";
        $q="";
        if($mode == "basic"){
            $q = "SELECT * FROM projects WHERE userId=$id";
        }
        if($mode == "google"){
            $q = "SELECT * FROM team WHERE emailAddress='$email'";
        }

        $sql = $conn->prepare($q);
        $sql->execute();
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function updateTeam($profile_name, $profile_image, $teamId){
        require_once "conn.php";

        $query = "UPDATE team SET teamName='$profile_name', image='$profile_image', inviteValue=1 WHERE teamId=$teamId";

        #echo $query;

        $edit = $conn->prepare($query);
        $sqlset = $edit->execute();
        return $sqlset;
    }
    //listing data
    public function listMembers($id){
        require_once "conn.php";
      
            $q = "SELECT * FROM team WHERE projectId='$id' AND inviteValue=1 ORDER BY roleId DESC";


        $sql = $conn->prepare($q);
        $sql->execute();
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function finishedTask($projId){
        require_once "conn.php";
      
            $q = "SELECT * FROM update_logs WHERE projectId='$projId' AND confirmId=2 ORDER BY ul_id DESC LIMIT 20";
            #echo $q;


        $sql = $conn->prepare($q);
        $sql->execute();
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function createdtask($projId){
        require_once "conn.php";
      
            $q = "SELECT task.taskId, task.taskName, task.dateCreated, product.Stories FROM (task INNER JOIN product on task.productId = product.ProductID) WHERE task.projectId='$projId' ORDER BY dateCreated DESC LIMIT 20";
            #echo $q;


        $sql = $conn->prepare($q);
        $sql->execute();
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function isMember($projId, $email){
        require_once "conn.php";
      
            $q = "SELECT * FROM team WHERE emailAddress='$email' AND projectId=$projId";
            #echo $q;
            $sql = $conn->prepare($q);
            $sql->execute();
            $data = $sql->rowCount();
            return $data;
    }

    public function listBoard($projId, $statusId, $color, $sprint){
        require_once "conn.php";
            
            $q = "SELECT task.taskId, task.taskName, task.targetName, task.taskTime, task.productId, task.color, task.teamName, task.projectId, task.taskComment, product.sprintId, product.Stories FROM (task INNER JOIN product on task.productId = product.ProductID) WHERE task.projectId='$projId' AND task.statusId='$statusId' AND product.sprint_number=$sprint";
            $q2 = "";

            if($color != "All"){
                $q2 = " AND task.color='$color'";
            }
            //SELECT task.taskId, task.taskName, task.color, task.teamName, task.projectId, product.sprintId FROM (task INNER JOIN product on task.productId = product.ProductID)
            #echo $q.$q2;

            $sql = $conn->prepare($q.$q2." ORDER BY task.taskId DESC");
            $sql->execute();
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
    }

    //edit-project
    public function editProject($projName, $projId){
        require_once "conn.php";

        $query = "UPDATE projects SET project='$projName' WHERE projectId=$projId";
        $queryCount = "SELECT * FROM projects WHERE project='$projName' AND projectId=$projId";
        $editCheck = $conn->prepare($queryCount);
        $editCheck->execute();
        $count = $editCheck->rowCount();


        if($count == 1)
        {
            $msg = "taken";
            return $msg;
        }
        else{
            $edit = $conn->prepare($query);
            $sqlset = $edit->execute();
            return $sqlset;
        }

    }

    //edit-project
    public function setTimer($projId, $sprintNum, $dueTime){
        require_once "conn.php";

        //check if there is task attach on the stories
        $queryCount = "SELECT product.sprint_number, task.taskName FROM (task INNER JOIN product on task.productId = product.ProductID) WHERE task.projectId='$projId' AND product.sprint_number=$sprintNum";
        $qtaskSql = $conn->prepare($queryCount);
        $qtaskSql->execute();
        $taskCount = $qtaskSql->rowCount();
        
        

        if($taskCount < 1){
            $msg = "lack";
            return $msg;
        }
        else{
            $query = "UPDATE projects SET currentSprint='$sprintNum', timeDue='$dueTime' WHERE projectId=$projId";
            $edit = $conn->prepare($query);
            $sqlset = $edit->execute();
            return $sqlset;
        }
    }

    public function cancelTimer($projId){
        require_once "conn.php";
            $query = "UPDATE projects SET currentSprint='', timeDue='' WHERE projectId=$projId";
            $edit = $conn->prepare($query);
            $sqlset = $edit->execute();
            return $sqlset;
    }

    //edit-first time account
    public function isNew($email){
        require_once "conn.php";

        $query = "UPDATE googleaccounts SET IsNew='1' WHERE email='$email'";
        $edit = $conn->prepare($query);
        $sqlset = $edit->execute();
        return $sqlset;
    }

    //edit-color
    public function editColor($teamId, $projId, $colorName, $teamName){
        require_once "conn.php";

        $query = "UPDATE team SET color='$colorName' WHERE teamId=$teamId";
        $queryCount = "SELECT * FROM team WHERE projectId=$projId AND color='$colorName'";
        $editCheck = $conn->prepare($queryCount);
        $editCheck->execute();
        $count = $editCheck->rowCount();


        if($count == 1)
        {
            $msg = "taken";
            return $msg;
        }
        else{

            $queryAll = "UPDATE task SET color='$colorName' WHERE projectId=$projId AND teamName='$teamName'";
            
            $editAll = $conn->prepare($queryAll);
            $sqlsetAll = $editAll->execute();

            $edit = $conn->prepare($query);
            $sqlset = $edit->execute();
            return $sqlset;
        }

    }

    public function editRole($teamId, $roleName){
        require_once "conn.php";

        $query = "UPDATE team SET roleId='$roleName' WHERE teamId=$teamId";
        $edit = $conn->prepare($query);
        $sqlset = $edit->execute();
        return $sqlset;

    }

    public function AcceptLog($log){
        require_once "conn.php";

        $query = "UPDATE update_logs SET confirmId=2 WHERE ul_id=$log";
        $edit = $conn->prepare($query);
        $sqlset = $edit->execute();
        return $sqlset;

    }
    public function DeclineLog($log, $taskId, $comment){
        require_once "conn.php";

        $querytask = "UPDATE task SET statusId=2, taskComment='$comment' WHERE taskId=$taskId";
        $edit2 = $conn->prepare($querytask);
        $sqlset2 = $edit2->execute();

        $query = "UPDATE update_logs SET confirmId=1 WHERE ul_id=$log";
        $edit = $conn->prepare($query);
        $sqlset = $edit->execute();
        return $sqlset;

    }

    public function editStatus($task, $status, $projectId){
        require_once "conn.php";

        //update logs
        if($status == 3){
            
            //find taskId information
            $findTask = "SELECT * FROM task WHERE taskId='$task'";


            $taskInfo = $conn->prepare($findTask);
            $taskInfo->execute();
            $data = $taskInfo->fetch(PDO::FETCH_ASSOC);
            extract($data);

            $exTaskId = $taskId;
            $exTeamName = $teamName;
            $exTaskName = $taskName;
            $exEstimateTime = $taskTime;
            
            //get the story
            $exProductId = $productId;

            //find userPicture get project id and teamname to get picture
            $findTeam = "SELECT * FROM team WHERE teamName='$teamName' AND projectId='$projectId'";
            $teamInfo = $conn->prepare($findTeam);
            $teamInfo->execute();
            $datateam = $teamInfo->fetch(PDO::FETCH_ASSOC);
            extract($datateam);

            $exImage = $image;

            //find Story
            $findStory = "SELECT * FROM product WHERE ProductID='$exProductId'";
            $StoryInfo = $conn->prepare($findStory);
            $StoryInfo->execute();
            $data = $StoryInfo->fetch(PDO::FETCH_ASSOC);
            extract($data);

            $exStories = $Stories;


            $logMessage = "Move this task";
            //projectId is required
            $addteam = "INSERT INTO update_logs (teamName, teamPic, logMessage, taskName, estimateTime, fromStory, projectId, taskId) VALUES ('$exTeamName', '$exImage', '$logMessage', '$exTaskName', '$exEstimateTime', '$exStories',  '$projectId', '$task')";
            #echo $addteam;
            $sqlset = $conn->prepare($addteam);
            $sqlsetTo = $sqlset->execute();

            $query = "UPDATE task SET statusId=$status WHERE taskId=$task";
            $edit = $conn->prepare($query);
            $sqlset = $edit->execute();
            return $sqlset;

        }

        else
        {
            $query = "UPDATE task SET statusId=$status WHERE taskId=$task";
            $edit = $conn->prepare($query);
            $sqlset = $edit->execute();
            return $sqlset;
        }
        

    }

    public function editOwner($taskId, $member, $colorName){
        require_once "conn.php";

        $query = "UPDATE task SET color='$colorName', teamName='$member' WHERE taskId=$taskId";

        $edit = $conn->prepare($query);
        $sqlset = $edit->execute();
        return $sqlset;

    }

}