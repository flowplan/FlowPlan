<script>

    function deleteSprint(sprint){
        warn = "Are your sure do you want to delete this sprint? Once sprint is deleted the Story will return to the Unset Sprints and the Miscellaneous Task will be remove and not be recovered.";
        swal.fire({
            title: 'Confirmation',
            text: warn,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete the sprint!'
            }).then((result)=>{
            if(result.isConfirmed){
                //swal.fire("Success!!");
                var currentSprint = $(".hid_filter_timer").val();
                if(sprint == currentSprint){
                    swal.fire("This sprint is currently running you need to stop the timer to delete the sprint.");
                    closeSprint();
                }
                else{
                    $.ajax({
                    url:"class/delete-sprint.php?sprint="+sprint,
                    method: "GET",
                    dataType: "JSON",
                    success:function(e){
                        swal.fire("Sprint "+sprint+" has been successfully deleted!!");
                        closeSprint();
                        showSprint();
                    }
                })
                }
            }
        })

    }

    $(document).ready(function () {
        $(".task_Container, .ToDo_Container, .Progress_Container").sortable({connnectWith:".task_Container, .ToDo_Container, .Progress_Container"});
        $(".dateTimeTrack").draggable();
    });


    //dragging UI
    $(document).ajaxComplete(function () {
        $(".dateTimeTrack").draggable();

        /*$(".task_data").draggable({
            start: function(event, ui){
                $(this).parent().css({"z-index":"5"});
            },
            stop: function(event, ui){
                $(this).parent().css({"z-index":"1"});
            }
        });*/

        $(".task_Container, .ToDo_Container, .Progress_Container").sortable({connnectWith:".task_Container, .ToDo_Container, .Progress_Container"});

        $(".task_Container").droppable({
            drop: function(event, ui) {
                var dataId = ui.draggable.data("id");
                var dataTeam = ui.draggable.data("team");
                var dataStatus = ui.draggable.data("status");
                //swal.fire(dataId);
                if("<?php echo $profile_name;?>" == dataTeam || <?php echo $roleId;?> == 1){
                    if(dataStatus != 4){
                        changeStatus(dataId, 4);
                    }
                }
                else{
                    //scrumTask();
                    //scrumTodo();
                    //scrumInProgress();
                    //scrumDone();
                }
            },
            over: function(event, ui){
                $(this).css({"z-index":"1"});
            },
            out: function(event, ui){
                $(this).css({"z-index":"5"});
            }
        });

        $(".ToDo_Container").droppable({
            drop: function(event, ui) {
                var dataId = ui.draggable.data("id");
                var dataTeam = ui.draggable.data("team");
                var dataStatus = ui.draggable.data("status");
                //swal.fire(dataId);
                if("<?php echo $profile_name;?>" == dataTeam || <?php echo $roleId;?> == 1){
                    if(dataStatus != 1){
                        changeStatus(dataId, 1);
                    }
                }
                else{
                    //scrumTask();
                    //scrumTodo();
                    //scrumInProgress();
                    //scrumDone();
                }
            },
            over: function(event, ui){
                $(this).css({"z-index":"1"});
            },
            out: function(event, ui){
                $(this).css({"z-index":"5"});
            }
        });

        $(".Progress_Container").droppable({
            drop: function(event, ui) {
                var dataId = ui.draggable.data("id");
                var dataTeam = ui.draggable.data("team");
                var dataStatus = ui.draggable.data("status");
                //swal.fire(dataId);
                if("<?php echo $profile_name;?>" == dataTeam || <?php echo $roleId;?> == 1){
                    if(dataStatus != 2){
                        changeStatus(dataId, 2);
                    }
                }
                else{
                    //scrumTask();
                    //scrumTodo();
                    //scrumInProgress();
                    //scrumDone();
                }
            },
            over: function(event, ui){
                $(this).css({"z-index":"1"});
            },
            out: function(event, ui){
                $(this).css({"z-index":"5"});
            }
        });

        $(".Done_Container").droppable({
            drop: function(event, ui) {
                var dataId = ui.draggable.data("id");
                var dataTeam = ui.draggable.data("team");
                var dataStatus = ui.draggable.data("status");
                //swal.fire(dataId);
                if("<?php echo $profile_name;?>" == dataTeam || <?php echo $roleId;?> == 1){

                    /*if(dataStatus != 3){
                        changeStatus(dataId, 3);
                    }*/

                    $(".doneId_status").val(dataId);
                    $(".black2").show();
                    $(".window2").show();
                    $(".done_links").show();

                }
                else{
                    //scrumTask();
                    //scrumTodo();
                    //scrumInProgress();
                    //scrumDone();
                }
            },
            over: function(event, ui){
                $(this).css({"z-index":"1"});
            },
            out: function(event, ui){
                $(this).css({"z-index":"5"});
            }
        });
    });

    //check if a member
    function isMember(){
        var projectId = <?php echo $myProjectId;?>;
        var email = "<?php echo $profile_email;?>";
        $.ajax({
                url:"class/is-member.php?projId="+projectId+"&email="+email,
                method: "GET",
                dataType: "JSON",
                success:function(e){
                    if(e != 1){
                        location.replace("logoutProject.php");
                    }
                }
        })    
    }
    //check if its login
    function isLogin(){
            $.ajax({
                url:"class/is-login.php",
                method: "GET",
                dataType: "JSON",
                success:function(e){
                    if(e == "out"){
                        location.replace("logout.php");
                    }
                    else if(e == "project"){
                        location.replace("logoutProject.php");
                    }
                    else if(e == "Not Member"){
                        var projectName = $(".hidden_proj_name").val();
                        var msg = "The '"+projectName+"' project you working on is no longer exist to your invited projects";
                        location.replace("logoutProject.php?msg="+msg);
                    }
                    else if(e == "Changes"){
                        var projectId = <?php echo $myProjectId;?>;
                        $.ajax({
                            url:"class/autoUpdate.php?projId="+projectId,
                            method: "GET",
                            dataType: "JSON",
                            success:function(e){
                                listMembers();
                                scrumTask();
                                //scrumTodo();
                                //scrumInProgress();
                                //scrumDone();      
                            }
                        })
                    }
                
                    else if(e == "Notify"){
                        var projectId = <?php echo $myProjectId;?>;
                        $.ajax({
                            url:"class/teamNotify.php?projId="+projectId,
                            method: "GET",
                            dataType: "JSON",
                            success:function(e){
                                html= "";

                                $(e).each(function(key, value){
                                    html+="<div style='text-align:left'>";
                                    html+="<strong>Task Name: </strong><span style='color: blue'>"+value.taskNameUp+"</span><br>";
                                    html+="<strong>Definition of Done: </strong><span style='color: blue'>"+value.taskTargetUp+"</span><br>";
                                    html+="<strong>Comment: </strong><span style='color: red'>"+value.taskCommentUp+"</span>";
                                    html+="</div>";
                                })
                                swal.fire({
                                    title: 'Task Notification',
                                    icon: 'info',
                                    html: html,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Okay'
                                })
                                $.ajax({
                                    url:"class/updateNotify.php?projId="+projectId,
                                    method: "GET",
                                    dataType: "JSON",

                                    success:function(e){
                                        remove_menu_active();
                                        scrumTask();
                                        //scrumTodo();
                                        //scrumInProgress();
                                        //scrumDone();
                                        $(".board_menu").addClass("menu_active");
                                        $(".Title").text("Scrum Board");
                                        $(".board_content").show();
                                        $(".filter_dropdown").hide();
                                    }
                                })
                            }
                        })
                    }
                    else if(e == "New Member"){
                        var projectId = <?php echo $myProjectId;?>;
                        $.ajax({
                            url:"class/new_member.php?projId="+projectId,
                            method: "GET",
                            dataType: "JSON",

                            success:function(e){
                                if(<?php echo $roleId?> ==1){

                                swal.fire({
                                    position: 'top-end',
                                    //icon: 'success',
                                    backdrop: false,
                                    title: 'A new member joins the project',
                                    showConfirmButton: false,
                                    allowOutsideClick: false,
                                    timer: 3000
                                });

                                }
                            }
                        })
                    }
                    else if(e == "New Task"){
                        var projectId = <?php echo $myProjectId;?>;
                        var email = "<?php echo $profile_email;?>";
                        $.ajax({
                            url:"class/new_task.php?projId="+projectId+"&email="+email,
                            method: "GET",
                            dataType: "JSON",

                            success:function(e){
                                if(<?php echo $roleId?> !=1){

                                swal.fire({
                                    position: 'top-end',
                                    //icon: 'success',
                                    title: 'A task has been assigned to you please check the task list in the scrum board.',
                                    showConfirmButton: false,
                                    allowOutsideClick: false,
                                    timer: 3000
                                });

                                }
                            }
                        })
                    }

                    else if(e == "Finished"){
                        if(<?php echo $roleId?> ==1){
                            var projectId = <?php echo $myProjectId;?>;
                            var email = "<?php echo $profile_email;?>";
                            $.ajax({
                                url:"class/finished_task.php?projId="+projectId+"&email="+email,
                                method: "GET",
                                dataType: "JSON",

                                success:function(e){
                                    if(<?php echo $roleId?> ==1){

                                        swal.fire({
                                            position: 'top-end',
                                            //icon: 'success',
                                            backdrop: false,
                                            title: 'A task has been finished check the reports to see the results.',
                                            showConfirmButton: false,
                                            allowOutsideClick: false,
                                            timer: 3000
                                        });

                                    }
                                }
                            })                            
                        }
                    }
                }
        }) 
    }

    //cancel sprint
    $(document).on("click",".stopMySprint",function(){
        var warn = "Are you sure do you want stop the sprint? The status of all the story assigned to the sprint will change to DONE.";
        var projectId = <?php echo $myProjectId;?>;

        if(<?php echo $roleId;?> == 1){
            swal.fire({
            title: 'Confirmation',
            text: warn,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Stop the sprint!'
            }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    url:"class/cancel-timer.php?projId="+projectId,
                    method: "GET",
                    dataType: "JSON",
                    success:function(e){
                        if(e != "lack"){
                            $(".hid_filter_timer").val("");
                            $(".hid_filter_due").val("");
                            showProjectStories();
                        }
                        else{
                            var sprintNum = $(".hid_filter_sprint").val();

                            swal.fire({
                                icon: "error",
                                html: "The <b>sprint "+sprintNum+"</b> still have a task left before stopping the running sprint. <span style='color:red'>You need to finish all the task to proceed.</span>"
                            })
                        }
                    }
                })
            }
            })
        }
    });

    //adjust day week
    function adjustDW(){
    var adjust = $(".adjustDW").html();
    var setAdjust = "";

        if(adjust == "Change to weeks"){
            setAdjust = "Change to days";
            $(".adjustDW").html(setAdjust);
            $(".adjustDWoutput").html("Weeks");
        }
        else if(adjust == "Change to days"){
            setAdjust = "Change to weeks";
            $(".adjustDW").html(setAdjust);
            $(".adjustDWoutput").html("Days");
        }
    }

    //check if first timer account or Is new
    function IsNew(){

        var IsNew = $(".hidden_new").val();
        var email = '<?php echo $_SESSION['email'];?>';

        if(IsNew == '0')
        {
            $.ajax({
                url:"class/isNew.php?email="+email,
                method: "GET",
                dataType: "JSON",
                
                success:function(e){
                    var html="<input type='hidden' class='picNum' name='' value='1'><h4 style='color:white;'>How to use Flow Plan?</h3>";
                        html+="<div class='container_help'><img class='help_image' src='tutorial_pics/1.JPG' alt=''></div>";
                        html+="<Button onclick='prevPic()'>Prev</Button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<Button onclick='nextPic()'>Next</Button>";

                    swal.fire({
                        title: "How to use Flowplan",
                        html: html,//"<center><div>Tutorial and Introduction</div></center><iframe src='https://www.youtube.com/embed/93otCyqd7zo' width='720' height='450' ></iframe>",//src='https://www.youtube.com/embed/tgbNymZ7vqY'
                        color: '#eee',
                        background: '#333',
                        showConfirmButton: false,
                        width: 800,
                        height: 450,
                    });
                    /*$(".window2").css("width", "900px");
                    $(".window2").css("top", "20px");
                    $(".window2").css("background-color", "rgba(51, 51, 51, 0.598)");//238
                    $(".black2").fadeIn()
                    $(".how_to_use").show()
                    $(".window2").show();*/
                }
            })
        }
    }
    //check if role not scrum master
    function roleRedirect(){
        if(<?php echo $roleId?> != 1){
            remove_menu_active();
            $(".board_menu").addClass("menu_active");
            $(".Title").text("Scrum Board");
            $(".board_content").show();
            $(".filter_dropdown").delay(1000).hide(function(){
                scrumTask();
                //scrumTodo();
                //scrumInProgress();
                //scrumDone();
                IsNew();
            });
        }
        else if(<?php echo $roleId?> == 1){
            $(".filter_dropdown").delay(1000).hide(function(){
                IsNew();
            });
        }
    }

    //due date
    function startSprint(sprint_id){
        const setDue = new Date().getTime();
        let weeks = $(".setSprintDue").val();
        let setAdjust = 0;
        let thisDue = $(".hid_filter_due").val();
        let thisTime = $(".hid_filter_timer").val();
        let extend = 0;
        var adjust = $(".adjustDW").html();
        
        if(adjust == "Change to days"){
            setAdjust = 604800000;
        }
        else if(adjust == "Change to weeks"){
            setAdjust = 86400000;
        }

        const DueSet = setDue+(setAdjust*weeks);
        //swal.fire(DueSet);
        if(sprint_id == thisTime){
            extend = parseInt(thisDue) + (setAdjust*weeks);
        }
        else{extend = DueSet;}

        const Due = extend;
        //swal.fire(extend);

        var projectId = <?php echo $myProjectId;?>;
        var timerModeAlert = $(".extendSprint").html(); 

        let warn = "Are you sure do you want to start a new sprint? The currently running sprint will stop and start a new sprint.";

        if(timerModeAlert == "Extend the sprint"){
            warn = "Are you sure do you want to extend the timer of the sprint?";
        }

        swal.fire({
            title: 'Confirmation',
            text: warn,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Proceed!'
            }).then((result)=>{
                if(result.isConfirmed){
            if(weeks != "" && weeks != '0'){
                let timeDue = Due;

                $.ajax({
                    url:"class/set-timer.php?projId="+projectId+"&sprintNum="+sprint_id+"&due="+timeDue,
                    method: "GET",
                    dataType: "JSON",
                    success:function(e){
                        if(e == "lack"){
                            swal.fire("You need atleast 1 task to start a sprint");
                        }
                        else{
                            $(".hid_filter_timer").val(sprint_id);
                            $(".hid_filter_due").val(Due);
                            $(".extendSprint").html("Extend the sprint");
                            if(timerModeAlert == "Extend the sprint"){
                                swal.fire("Sprint "+sprint_id+" timer has been extended");
                            }
                            else
                            {
                                swal.fire("Sprint "+sprint_id+" timer has been started");
                            }
                        }
                    }
                })
            }
            else{
                swal.fire("field is required to set time for the sprint");
            }
                }
            })
    }

    //timer start (learning)
    const countDown = () =>{
        var sprint = $(".hid_filter_timer").val();
        const due = $(".hid_filter_due").val();

        //const countDate = new Date("July 31, 2022 00:00:00").getTime();
        const now = new Date().getTime();
        const gap = due - now;

        // clock tiks
        const second = 1000;
        const minute = second * 60;
        const hour = minute * 60;
        const days = hour * 24;

        //count down out
        const textDay = Math.floor(gap / days);
        const textHour = Math.floor((gap % days) / hour);
        const textMin = Math.floor((gap % hour) / minute);
        const textSec = Math.floor((gap % minute) / second);

        if(sprint != 0){
            if(due < now){
                $(".dateTimeTrack").show();
                if(<?php echo $roleId;?> == 1)
                {
                    $(".dateTimeTrack").html("<div class='stopMySprint'><strong>Stop</strong></div><span style='color:green;'>Sprint "+sprint+"</span>&nbsp;&nbsp;&nbsp;&nbsp;<Strong style='color:red'>Overdue : </Strong> "+textDay+"Days "+textHour+"Hrs "+textMin+"Min "+textSec+"Sec");
                }
                else
                {
                    $(".dateTimeTrack").html("<span style='color:green;'>Sprint "+sprint+"</span>&nbsp;&nbsp;&nbsp;&nbsp;<Strong style='color:red'>Overdue : </Strong> "+textDay+"Days "+textHour+"Hrs "+textMin+"Min "+textSec+"Sec");
                }             
            }
            else{
                $(".dateTimeTrack").show();
                if(<?php echo $roleId;?> == 1)
                {
                    $(".dateTimeTrack").html("<div class='stopMySprint'><strong>Stop</strong></div><span style='color:green;'>Sprint "+sprint+"</span>&nbsp;&nbsp;&nbsp;&nbsp;<Strong>Time left: </Strong> "+textDay+"Days "+textHour+"Hrs "+textMin+"Min "+textSec+"Sec");
                }
                else
                {
                    $(".dateTimeTrack").html("<span style='color:green;'>Sprint "+sprint+"</span>&nbsp;&nbsp;&nbsp;&nbsp;<Strong>Time left: </Strong> "+textDay+"Days "+textHour+"Hrs "+textMin+"Min "+textSec+"Sec");
                }
            }
        }
        else{
            $(".dateTimeTrack").hide();
            $(".dateTimeTrack").html("");
        }
    }

    //show finished task
    function finishedTask(){
        var projectId = <?php echo $myProjectId;?>;

        $.ajax({
            url:"class/list-finished.php?projId="+projectId,
            method: "GET",
            dataType: "JSON",

            success:function(e){
                var html="";

                if(e == "")
                {
                    html+="<br><div class='update_logs_data'>No tasks yet is done to the project.</div>";
                    $(".finished_task_container").html(html);
                }
                else
                {
                    $(e).each(function(key, value){
                        var sliceMe = value.dateTime;
                        var dateTime = sliceMe.slice(0, 16);

                        taskName = value.taskName;
                        taskName = taskName.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                        fromStory = value.fromStory;
                        fromStory = fromStory.replace(/</g, "&lt;").replace(/>/g, "&gt;");

                        //html+="<div class='finished_task_data'><strong>"+value.teamName+"</strong>&nbsp;Finished the task &nbsp;<strong>"+taskName+"</strong>&nbsp; at <span style='color:blue'>"+dateTime+"</span> to the&nbsp;<strong>story</strong> <span style='color:blue'>"+fromStory+" time of "+value.estimateTime+" Hours</span></div>";

                        html+="<div class='finished_task_data'><table class='td_report'><tr><td class='td_Ruser'><div class='report_user'><div class='report_userPic'>";
                        html+="<img width='40' height='40' src='"+value.teamPic+"' alt='pic'>";
                        html+="</div></div></td><td class='td_Rdetails'><div class='report_details'>";
                        html+="<div class='report_userName'><strong>Task Owner: </strong>"+value.teamName+"</div>";
                        html+="<div class='report_task'><strong>Task: </strong>"+taskName+"</div>";
                        html+="<div class='report_story'><strong>Date Finished: </strong>"+dateTime+"</div>";
                        html+="</div></td><td class='td_Raction'><strong style='color:#333'>"+value.estimateTime+" Hours</strong>";
                        html+="</td></tr></table></div>";

                        $(".finished_task_container").html(html);
                    })
                }
            }
        })
    }

    //show created task
    function createdTask(){
        var projectId = <?php echo $myProjectId;?>;

        $.ajax({
            url:"class/list-createdtask.php?projId="+projectId,
            method: "GET",
            dataType: "JSON",

            success:function(e){
                var html="";

                if(e == "")
                {
                    html+="<br><div class='update_logs_data'>No tasks yet is added to the project</div>";
                    $(".created_taskk_container").html(html);
                }
                else
                {
                    $(e).each(function(key, value){
                        taskName = value.taskName;
                        taskName = taskName.replace(/</g, "&lt;").replace(/>/g, "&gt;");

                        Stories = value.Stories;
                        Stories = Stories.replace(/</g, "&lt;").replace(/>/g, "&gt;");

                        var sliceMe = value.dateCreated;
                        var dateCreated = sliceMe.slice(0, 16);

                        html+="<div class='created_task_data'><strong style='color:gray;'><i>"+dateCreated+" -<i></strong>&nbsp;a task has been created named &nbsp;<strong>"+taskName+"</strong>&nbsp; to the&nbsp;<strong>story</strong>&nbsp;<span style='color:blue'>"+Stories+"</span></div>"
                        $(".created_taskk_container").html(html);
                    })
                }
            }
        })
    }

    //filter scrumboard by sprint
    function getboardSprint(sprintId){
        var colorFilter = $(".hid_filter_sprint").val(sprintId);
        var colorFilter = $(".filterSprint").html("Sprint " + sprintId);

        scrumTask();
        //scrumTodo();
        //scrumInProgress();
        //scrumDone();

    }
    //fileter scrumboard by color
    $(document).on("click",".fileter_select_member",function(){
        var color = $(this).data('color');
        var name = $(this).data('name');
        var colorFilter = $(".hid_filter_color").val(color);
        if(name == "all"){
            filter = "Filter Member"
        }
        else
        {
            filter = name;
        }
        $(".filter_member").html(filter);
        $(".filter_dropdown").hide();

        scrumTask();
        //scrumTodo();
        //scrumInProgress();
        //scrumDone();
    })

    //decline log
    function declineLog(id, taskId){

        var merge = ".addComment"+taskId;
        var mergeHid = ".user"+taskId;
        var hidden = $(mergeHid).val();
        var comment = $(merge).val();

        $.ajax({
            url:"class/decline-update.php?id="+id+"&taskid="+taskId+"&comment="+comment+"&user="+hidden,
            method: "GET",
            dataType: "JSON",

            success:function(e){
                update_logs();
                summaryCount();
            }
        })
    }

    //accept log
    function acceptLog(id, taskId){
        var mergeHid = ".user"+taskId;
        var hidden = $(mergeHid).val();
        $.ajax({
            url:"class/accept-update.php?id="+id+"&taskId="+taskId+"&user="+hidden,
            method: "GET",
            dataType: "JSON",

            success:function(e){
                update_logs();
                summaryCount();
                finishedTask();
            }
        })
    }

    //display update logs
    function update_logs(){
        var projectId = <?php echo $myProjectId;?>;
        $.ajax({
            url:"class/show-update.php?projId="+projectId,
            method: "GET",
            dataType: "JSON",

            success:function(e){
                //1 2 3 ruling
                var html = "";
                
                if(e == "")
                {
                    html+="<br><div class='update_logs_data'>No updates yet is added to the project</div>";
                    $(".update_logs_container").html(html);
                }
                else
                {
                $(e).each(function(key, value){

                    taskName = value.taskName;
                    taskName = taskName.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                    fromStory = value.fromStory;
                    fromStory = fromStory.replace(/</g, "&lt;").replace(/>/g, "&gt;");

                    if(value.confirmId == 0)
                    {
                    //html+="<div class='update_logs_data'><strong>"+value.teamName+"</strong>&nbsp;"+value.logMessage+"&nbsp;<strong>"+taskName+"</strong>&nbsp;to&nbsp;<strong>Done</strong>&nbsp;from the Story <span style='color:blue;font-style:italic;'>"+fromStory+"</span>.</div>"
                    
                    html+="<div class='update_logs_data'><table class='td_report'><tr><td class='td_Ruser'><div class='report_user'><div class='report_userPic'>";
                    html+="<img width='40' height='40' src='"+value.teamPic+"' alt='pic'>";
                    html+="</div></div></td><td class='td_Rdetails'><div class='report_details'>";
                    html+="<div class='report_userName'><strong>Task Owner: </strong>"+value.teamName+"</div>";
                    html+="<div class='report_task'><strong>Task: </strong>"+taskName+" <a href='"+value.doneLink+"' target='_blank'>View Submission</a></div>";
                    
                    if(value.fromStory == "instantStoryMakerforInstantTask"){
                        html+="<div class='report_story'><strong>Story: </strong>Miscellaneous</div>";
                    }
                    else{
                        html+="<div class='report_story'><strong>Story: </strong>"+fromStory+"</div>";
                    }

                    //check if checked
                    if(value.confirmId == 0)
                    {
                    html+="<div class='report_comment'><strong>Comment: </strong>";
                    html+="<input class='user"+value.taskId+"' value='"+value.teamName+"' type='hidden'>";
                    html+="<input class='addComment"+value.taskId+"' type='text' maxlength='100' style='font-size: 14px;'></div>";
                    }
                    html+="</div></td><td class='td_Raction'>";
                    
                    //check if checked
                    if(value.confirmId == 0)
                    {
                    html+="<div class='report_action'><button class='update_confirm' onclick='acceptLog("+value.ul_id+", "+value.taskId+")'>Accept</button><br><button onclick='declineLog("+value.ul_id+", "+value.taskId+")' class='update_confirm'>Decline</button></div>";
                    }
                    html+="</td></tr></table></div>";

                    $(".update_logs_container").html(html);
                    }

                    else
                    {
                    html+="<div class='update_logs_data'><table class='td_report'><tr><td class='td_Ruser'><div class='report_user'><div class='report_userPic'>";
                    html+="<img width='40' height='40' src='"+value.teamPic+"' alt='pic'>";
                    html+="</div></div></td><td class='td_Rdetails'><div class='report_details'>";
                    html+="<div class='report_userName'><strong>Task Owner: </strong>"+value.teamName+"</div>";
                    html+="<div class='report_task'><strong>Task: </strong>"+taskName+" <a href='"+value.doneLink+"' target='_blank'>View Submission</a></div>";
                    if(value.fromStory == "instantStoryMakerforInstantTask"){
                        html+="<div class='report_story'><strong>Story: </strong>Miscellaneous</div>";
                    }
                    else{
                        html+="<div class='report_story'><strong>Story: </strong>"+fromStory+"</div>";
                    }
                    html+="</div></td><td class='td_Raction'>";
                    html+="</td></tr></table></div>";

                    $(".update_logs_container").html(html);
                    }
                })
                }
            }
        })

    }

    function checkMaxLength(){
        var doneLinks = $(".doneLinks").val().length;
        if(doneLinks > 30){
            $(".recommendShort").show();
        }
        else{
            $(".recommendShort").hide();
        }
    }

    function finishStatus(){
        var taskId = $(".doneId_status").val();
        var link = $(".doneLinks").val();
        var projectId = <?php echo $myProjectId;?>;
        var status = 3;
        var result = link.indexOf("https://");
        var attachment = "";

        if(result == 0){
            attachment = link;
            //alert(attachment);
        }
        else{
            var http = link.indexOf("http://");
            if(http == 0)
            {
                attachment = link;
            }
            else{
                attachment = "https://"+link;
            }
            //alert(attachment);
        }

        if(link == ""){
            swal.fire("Link attachment is required");
        }
        else{

            $.ajax({
                    url:"class/finish-status.php?taskId="+taskId+"&status="+status+"&projId="+projectId+"&link="+link,
                    method: "GET",
                    dataType: "JSON",

                    success:function(e){
                        if(e != "unset"){
                            if(e == "invalid"){
                                swal.fire({
                                    icon: "error",
                                    text: "The URL you sent is invalid.",
                                });
                            }
                            else{
                                swal.fire({
                                    icon: "success",
                                    text: "Link Attachment Complete!!",
                                });
                                scrumTask();
                                //scrumTodo();
                                //scrumInProgress();
                                //scrumDone();

                                $(".doneLinks").val("");
                                form_close();
                            }
                        }
                        else{
                            swal.fire({
                                icon: "error",
                                text: "Please assign the task first before changing the Status.",
                            });
                        }
                }
            })
        }
    }


    //update status
    function changeStatus(taskId, status){
        var projectId = <?php echo $myProjectId;?>;
        var taskOwner = $(".task_owner").html();

        if(status == 3){
            $(".doneId_status").val(taskId);
            $(".black2").show();
            $(".window2").show();
            $(".done_links").show();
        }

        else{

            $.ajax({
                url:"class/edit-status.php?taskId="+taskId+"&status="+status+"&projId="+projectId,
                method: "GET",
                dataType: "JSON",

                success:function(e){
                    if(e != "unset"){
                        scrumTask();
                        //scrumTodo();
                        //scrumInProgress();
                        //scrumDone();
                    }
                    else{
                        swal.fire("Please assign the task first before changing the Status.");
                    }
                }
            })
        }
    }
    //owner change
    $(document).on("click",".AssignedMember",function(){
        var taskId = $(this).parent().data('taskid');
        var member = $(this).data('member');
        var color = $(this).data('color');

        //swal.fire("task ID is "+taskId+member+color);
        $.ajax({
            url:"class/edit-owner.php?taskId="+taskId+"&member="+member+"&color="+color,
            method: "GET",
            dataType: "JSON",

            success:function(e){
                scrumTask();
                //scrumTodo();
                //scrumInProgress();
                //scrumDone();
            }
        })
    });
    /*show task (should be flexivle)--------------------------------*/
    function scrumTask(){
        var projectId = <?php echo $myProjectId;?>;
        var colorFilter = $(".hid_filter_color").val();
        var sprintFilter = $(".hid_filter_sprint").val();
        var statusId = 4;

        $.ajax({
            url:"class/list-board.php?projId="+projectId+"&status="+statusId+"&color="+colorFilter+"&sprint="+sprintFilter,
            method: "GET",
            dataType: "JSON",

            success:function(e){
                var html="";//divide into 4 status
                var task="";
                var todo="";
                var prog="";
                var done="";

                if(e == "")
                {
                    $(".task_Container").html(task);
                    $(".ToDo_Container").html(todo);
                    $(".Progress_Container").html(prog);
                    $(".Done_Container").html(done);
                    //listMembers();
                }
                else
                {

                $(e).each(function(key, value){

                taskName = value.taskName;
                taskName = taskName.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                targetName = value.targetName;
                targetName = targetName.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                if(value.taskComment != null){
                    taskComment = value.taskComment;
                    taskComment = taskComment.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                }
                else
                {
                    taskComment = "";
                }
                //profile color changer
                if(value.teamName == "<?php echo $profile_name;?>"){
                    if(value.color != "<?php echo $session_color;?>"){
                        var changeColor = value.color;
                        $('.role-color').css('background-color', changeColor);
                    }
                }

                if(value.statusId == 4){
                    //unset task
                    if(value.Stories != "instantStoryMakerforInstantTask"){
                    task+="<div class='task_data' data-status='"+value.statusId+"' data-team='"+value.teamName+"' data-iscom='"+value.isNewComment+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'>"+targetName+"</span><br><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                    if(value.teamName == "<?php echo $profile_name?>"){
                            if(value.isNewComment == 1){
                                task+="<div class='commentIndicator'></div>";
                            }
                            else if(value.isNewComment == 2){
                                task+="<div class='commentIndicator' style='background: rgb(113, 105, 105)'></div>";
                            }
                        }
                    }
                    else
                    {
                        task+="<div class='task_data' data-status='"+value.statusId+"' data-team='"+value.teamName+"' data-iscom='"+value.isNewComment+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'>"+targetName+"</span><br><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                        //html+="<div class='task_data' data-team='"+value.teamName+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'></span><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                        if(value.teamName == "<?php echo $profile_name?>"){
                            if(value.isNewComment == 1){
                                task+="<div class='commentIndicator'></div>";
                            }
                            else if(value.isNewComment == 2){
                                task+="<div class='commentIndicator' style='background: rgb(113, 105, 105)'></div>";
                            }
                        }
                    }
                    
                    //workload security
                    if("<?php echo $profile_name;?>" == value.teamName || <?php echo $roleId;?> == 1){
                        task+="<div class='TaskStatus'>Status</div>";
                        task+="<div class='changeStatus' style='display:none'>";
                        task+="<div onclick='changeStatus("+value.taskId+", 4)' class='actionTask'>Unset</div>";
                        task+="<div onclick='changeStatus("+value.taskId+", 1)' class='actionToDo'>To do</div>";
                        task+="<div onclick='changeStatus("+value.taskId+", 2)' class='actionProgress'>In Progress</div>";
                        task+="<div onclick='changeStatus("+value.taskId+", 3)' class='actionDone'>Done</div>";
                        task+="</div>";
                    }

                    task+="<span style='background-color:"+value.color+";' class='member4'></span>";
                    task+="<div class='task_owner'>"+value.teamName+"</div>";

                    if(<?php echo $roleId?> == 1){
                        task+="<div class='changeOwner' data-taskid='"+value.taskId+"' style='display:none'>";
                    }
                    else{
                    task+="<div style='padding:0;border:unset;' class='changeOwner' data-taskid='"+value.taskId+"' style='display:none'>";
                    }
                    task+="</div>";
                    task+="</div>";   
                }

                if(value.statusId == 1){
                    //todo task
                    if(value.Stories != "instantStoryMakerforInstantTask"){
                    todo+="<div class='task_data' data-status='"+value.statusId+"' data-team='"+value.teamName+"' data-iscom='"+value.isNewComment+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'>"+targetName+"</span><br><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                    if(value.teamName == "<?php echo $profile_name?>"){
                            if(value.isNewComment == 1){
                                todo+="<div class='commentIndicator'></div>";
                            }
                            else if(value.isNewComment == 2){
                                todo+="<div class='commentIndicator' style='background: rgb(113, 105, 105)'></div>";
                            }
                        }
                    }
                    else
                    {
                        todo+="<div class='task_data' data-status='"+value.statusId+"' data-team='"+value.teamName+"' data-iscom='"+value.isNewComment+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'>"+targetName+"</span><br><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                        //html+="<div class='task_data' data-team='"+value.teamName+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'></span><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                        if(value.teamName == "<?php echo $profile_name?>"){
                            if(value.isNewComment == 1){
                                todo+="<div class='commentIndicator'></div>";
                            }
                            else if(value.isNewComment == 2){
                                todo+="<div class='commentIndicator' style='background: rgb(113, 105, 105)'></div>";
                            }
                        }
                    }
                    
                    //workload security
                    if("<?php echo $profile_name;?>" == value.teamName || <?php echo $roleId;?> == 1){
                        todo+="<div class='TaskStatus'>Status</div>";
                        todo+="<div class='changeStatus' style='display:none'>";
                        todo+="<div onclick='changeStatus("+value.taskId+", 4)' class='actionTask'>Unset</div>";
                        todo+="<div onclick='changeStatus("+value.taskId+", 1)' class='actionToDo'>To do</div>";
                        todo+="<div onclick='changeStatus("+value.taskId+", 2)' class='actionProgress'>In Progress</div>";
                        todo+="<div onclick='changeStatus("+value.taskId+", 3)' class='actionDone'>Done</div>";
                        todo+="</div>";
                    }

                    todo+="<span style='background-color:"+value.color+";' class='member4'></span>";
                    todo+="<div class='task_owner'>"+value.teamName+"</div>";

                    if(<?php echo $roleId?> == 1){
                        todo+="<div class='changeOwner' data-taskid='"+value.taskId+"' style='display:none'>";
                    }
                    else{
                    todo+="<div style='padding:0;border:unset;' class='changeOwner' data-taskid='"+value.taskId+"' style='display:none'>";
                    }
                    todo+="</div>";
                    todo+="</div>";   
                }

                if(value.statusId == 2){
                    //inprogress task
                    if(value.Stories != "instantStoryMakerforInstantTask"){
                    prog+="<div class='task_data' data-status='"+value.statusId+"' data-team='"+value.teamName+"' data-iscom='"+value.isNewComment+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'>"+targetName+"</span><br><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                    if(value.teamName == "<?php echo $profile_name?>"){
                            if(value.isNewComment == 1){
                                prog+="<div class='commentIndicator'></div>";
                            }
                            else if(value.isNewComment == 2){
                                prog+="<div class='commentIndicator' style='background: rgb(113, 105, 105)'></div>";
                            }
                        }
                    }
                    else
                    {
                        prog+="<div class='task_data' data-status='"+value.statusId+"' data-team='"+value.teamName+"' data-iscom='"+value.isNewComment+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'>"+targetName+"</span><br><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                        //html+="<div class='task_data' data-team='"+value.teamName+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'></span><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                        if(value.teamName == "<?php echo $profile_name?>"){
                            if(value.isNewComment == 1){
                                prog+="<div class='commentIndicator'></div>";
                            }
                            else if(value.isNewComment == 2){
                                prog+="<div class='commentIndicator' style='background: rgb(113, 105, 105)'></div>";
                            }
                        }
                    }
                    
                    //workload security
                    if("<?php echo $profile_name;?>" == value.teamName || <?php echo $roleId;?> == 1){
                        prog+="<div class='TaskStatus'>Status</div>";
                        prog+="<div class='changeStatus' style='display:none'>";
                        prog+="<div onclick='changeStatus("+value.taskId+", 4)' class='actionTask'>Unset</div>";
                        prog+="<div onclick='changeStatus("+value.taskId+", 1)' class='actionToDo'>To do</div>";
                        prog+="<div onclick='changeStatus("+value.taskId+", 2)' class='actionProgress'>In Progress</div>";
                        prog+="<div onclick='changeStatus("+value.taskId+", 3)' class='actionDone'>Done</div>";
                        prog+="</div>";
                    }

                    prog+="<span style='background-color:"+value.color+";' class='member4'></span>";
                    prog+="<div class='task_owner'>"+value.teamName+"</div>";

                    if(<?php echo $roleId?> == 1){
                        prog+="<div class='changeOwner' data-taskid='"+value.taskId+"' style='display:none'>";
                    }
                    else{
                    prog+="<div style='padding:0;border:unset;' class='changeOwner' data-taskid='"+value.taskId+"' style='display:none'>";
                    }
                    prog+="</div>";
                    prog+="</div>";   
                }

                if(value.statusId == 3){
                    //done task
                    if(value.Stories != "instantStoryMakerforInstantTask"){
                    done+="<div class='task_data' data-status='"+value.statusId+"' data-team='"+value.teamName+"' data-iscom='"+value.isNewComment+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'>"+targetName+"</span><br><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                    if(value.teamName == "<?php echo $profile_name?>"){
                            if(value.isNewComment == 1){
                                done+="<div class='commentIndicator'></div>";
                            }
                            else if(value.isNewComment == 2){
                                done+="<div class='commentIndicator' style='background: rgb(113, 105, 105)'></div>";
                            }
                        }
                    }
                    else
                    {
                        done+="<div class='task_data' data-status='"+value.statusId+"' data-team='"+value.teamName+"' data-iscom='"+value.isNewComment+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'>"+targetName+"</span><br><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                        //html+="<div class='task_data' data-team='"+value.teamName+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'></span><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                        if(value.teamName == "<?php echo $profile_name?>"){
                            if(value.isNewComment == 1){
                                done+="<div class='commentIndicator'></div>";
                            }
                            else if(value.isNewComment == 2){
                                done+="<div class='commentIndicator' style='background: rgb(113, 105, 105)'></div>";
                            }
                        }
                    }
                    
                    //workload security
                    /*if("<?php echo $profile_name;?>" == value.teamName || <?php echo $roleId;?> == 1){
                        done+="<div class='TaskStatus'>Status</div>";
                        done+="<div class='changeStatus' style='display:none'>";
                        done+="<div onclick='changeStatus("+value.taskId+", 4)' class='actionTask'>Unset</div>";
                        done+="<div onclick='changeStatus("+value.taskId+", 1)' class='actionToDo'>To do</div>";
                        done+="<div onclick='changeStatus("+value.taskId+", 2)' class='actionProgress'>In Progress</div>";
                        done+="<div onclick='changeStatus("+value.taskId+", 3)' class='actionDone'>Done</div>";
                        done+="</div>";
                    }*/

                    done+="<span style='background-color:"+value.color+";' class='member4'></span>";
                    done+="<div class='task_owner'>"+value.teamName+"</div>";

                    if(<?php echo $roleId?> == 1){
                        done+="<div class='changeOwner' data-taskid='"+value.taskId+"' style='display:none'>";
                    }
                    else{
                    done+="<div style='padding:0;border:unset;' class='changeOwner' data-taskid='"+value.taskId+"' style='display:none'>";
                    }
                    done+="</div>";
                    done+="</div>";   
                }

                $(".task_Container").html(task);
                $(".ToDo_Container").html(todo);
                $(".Progress_Container").html(prog);
                $(".Done_Container").html(done);
                //listMembers();
                })
                }
            }
        })
    }
    function scrumTodo(){
        var projectId = <?php echo $myProjectId;?>;
        var statusId = 1;
        var colorFilter = $(".hid_filter_color").val();
        var sprintFilter = $(".hid_filter_sprint").val();

        $.ajax({
            url:"class/list-board.php?projId="+projectId+"&status="+statusId+"&color="+colorFilter+"&sprint="+sprintFilter,
            method: "GET",
            dataType: "JSON",

            success:function(e){
                var html="";

                if(e == "")
                {
                    $(".ToDo_Container").html(html);
                    listMembers();
                }
                else
                {

                $(e).each(function(key, value){

                    taskName = value.taskName;
                    taskName = taskName.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                    targetName = value.targetName;
                    targetName = targetName.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                    if(value.taskComment != null){
                        taskComment = value.taskComment;
                        taskComment = taskComment.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                    }
                    else
                    {
                        taskComment = "";
                    }

                    if(value.Stories != "instantStoryMakerforInstantTask"){
                        html+="<div class='task_data' data-team='"+value.teamName+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'>"+targetName+"</span><br><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                    }
                    else
                    {
                        html+="<div class='task_data' data-team='"+value.teamName+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'>"+targetName+"</span><br><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                        //html+="<div class='task_data' data-team='"+value.teamName+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'></span><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                    }
                if("<?php echo $profile_name;?>" == value.teamName || <?php echo $roleId;?> == 1){
                    html+="<div class='TaskStatus'>Status</div>";
                    html+="<div class='changeStatus' style='display:none'>";
                    html+="<div onclick='changeStatus("+value.taskId+", 4)' class='actionTask'>Unset</div>";
                    html+="<div onclick='changeStatus("+value.taskId+", 1)' class='actionToDo'>To do</div>";
                    html+="<div onclick='changeStatus("+value.taskId+", 2)' class='actionProgress'>In Progress</div>";
                    html+="<div onclick='changeStatus("+value.taskId+", 3)' class='actionDone'>Done</div>";
                    html+="</div>";
                }
                html+="<span style='background-color:"+value.color+";' class='member4'></span>";
                html+="<div class='task_owner'>"+value.teamName+"</div>";
                if(<?php echo $roleId?> == 1){
                    html+="<div class='changeOwner' data-taskid='"+value.taskId+"' style='display:none'>";
                }
                else{
                html+="<div style='padding:0;border:unset;' class='changeOwner' data-taskid='"+value.taskId+"' style='display:none'>";
                }
                html+="</div>";
                html+="</div>";

                $(".ToDo_Container").html(html);
                listMembers();
                })
                }
            }
        })

    }
    function scrumInProgress(){
        var projectId = <?php echo $myProjectId;?>;
        var statusId = 2;
        var colorFilter = $(".hid_filter_color").val();
        var sprintFilter = $(".hid_filter_sprint").val();

        $.ajax({
            url:"class/list-board.php?projId="+projectId+"&status="+statusId+"&color="+colorFilter+"&sprint="+sprintFilter,
            method: "GET",
            dataType: "JSON",

            success:function(e){
                var html="";

                if(e == "")
                {
                    $(".Progress_Container").html(html);
                    listMembers();
                }
                else
                {

                $(e).each(function(key, value){

                taskName = value.taskName;
                taskName = taskName.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                targetName = value.targetName;
                targetName = targetName.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                if(value.taskComment != null){
                    taskComment = value.taskComment;
                    taskComment = taskComment.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                }
                else
                {
                    taskComment = "";
                }

                if(value.Stories != "instantStoryMakerforInstantTask"){
                    html+="<div class='task_data' data-team='"+value.teamName+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'>"+targetName+"</span><br><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                }
                else
                {
                    html+="<div class='task_data' data-team='"+value.teamName+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'>"+targetName+"</span><br><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                }
                if("<?php echo $profile_name;?>" == value.teamName || <?php echo $roleId;?> == 1){
                    html+="<div class='TaskStatus'>Status</div>";
                    html+="<div class='changeStatus' style='display:none'>";
                    html+="<div onclick='changeStatus("+value.taskId+", 4)' class='actionTask'>Unset</div>";
                    html+="<div onclick='changeStatus("+value.taskId+", 1)' class='actionToDo'>To do</div>";
                    html+="<div onclick='changeStatus("+value.taskId+", 2)' class='actionProgress'>In Progress</div>";
                    html+="<div onclick='changeStatus("+value.taskId+", 3)' class='actionDone'>Done</div>";
                    html+="</div>";
                }
                html+="<span style='background-color:"+value.color+";' class='member4'></span>";
                html+="<div class='task_owner'>"+value.teamName+"</div>";
                if(<?php echo $roleId?> == 1){
                    html+="<div class='changeOwner' data-taskid='"+value.taskId+"' style='display:none'>";
                }
                else{
                html+="<div style='padding:0;border:unset;' class='changeOwner' data-taskid='"+value.taskId+"' style='display:none'>";
                }
                html+="</div>";
                html+="</div>";

                $(".Progress_Container").html(html);
                listMembers();
                })
                }
            }
        })

    }
    function scrumDone(){
        var projectId = <?php echo $myProjectId;?>;
        var statusId = 3;
        var colorFilter = $(".hid_filter_color").val();
        var sprintFilter = $(".hid_filter_sprint").val();

        $.ajax({
            url:"class/list-board.php?projId="+projectId+"&status="+statusId+"&color="+colorFilter+"&sprint="+sprintFilter,
            method: "GET",
            dataType: "JSON",

            success:function(e){
                var html="";

                if(e == "")
                {
                    $(".Done_Container").html(html);
                    listMembers();
                }
                else
                {
                $(e).each(function(key, value){

                taskName = value.taskName;
                taskName = taskName.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                targetName = value.targetName;
                targetName = targetName.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                if(value.taskComment != null){
                    taskComment = value.taskComment;
                    taskComment = taskComment.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                }
                else
                {
                    taskComment = "";
                }

                if(value.Stories != "instantStoryMakerforInstantTask"){
                    html+="<div class='task_data_done' data-team='"+value.teamName+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'>"+targetName+"</span><br><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                }
                else
                {
                    html+="<div class='task_data_done' data-team='"+value.teamName+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'>"+targetName+"</span><br><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                    //html+="<div class='task_data_done' data-team='"+value.teamName+"' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>"+taskName+"<br><span class='storyInBoard'></span><span class='comment' style='color:red; display:none'>"+taskComment+"</span>";
                }
                
                html+="<span style='background-color:"+value.color+";' class='member4'></span>";
                html+="<div class='task_owner'>"+value.teamName+"</div>";
                html+="<div class='changeOwner' data-taskid='"+value.taskId+"' style='display:none'>";
                html+="</div>";
                html+="</div>";

                $(".Done_Container").html(html);
                listMembers();
                })
                }
            }
        })

    }
    /*show task (should be flexivle)--------------------------------*/

    //removeMember
    function removeMember(teamId){
        let warn = "Are you sure do you want to remove this member to your project?";

        swal.fire({
          title: 'Confirmation',
          text: warn,
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Remove this member!'
        }).then((result)=>{
          if(result.isConfirmed){
            $.ajax({
                url:"class/delete-member.php?teamId="+teamId,
                method: "GET",
                dataType: "JSON",

                success:function(e){    
                    swal.fire("The story has been successfully removed to your project.");
                    listMembers();
                    summaryCount();
                }
            })
          }
        })
    }

    //removeMember
    function declineMember(teamId){
        let warn = "Are you sure do you want to decline this member resignation request?";

        swal.fire({
          title: 'Confirmation',
          text: warn,
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Decline Request'
        }).then((result)=>{
          if(result.isConfirmed){
            $.ajax({
                url:"class/resign-decline-member.php?teamId="+teamId,
                method: "GET",
                dataType: "JSON",

                success:function(e){    
                    swal.fire({
                        icon: "info",
                        text: "Request declined"
                    });
                    listMembers();
                    summaryCount();
                }
            })
          }
        })
    }

    //team edit color
    function editRole(teamId, role){
        var merge = ".roleVal"+teamId;
        var otherRole = $(merge).val();

        if(role == 8 && otherRole != ""){
            $.ajax({
                url:"class/edit-role.php?teamId="+teamId+"&role="+role+"&otherRole="+otherRole,
                method: "GET",
                dataType: "JSON",

                success:function(e){
                listMembers();
                }
            })
        }
        else if(role == 8 && otherRole == ""){
            swal.fire("Missing requirement please enter their role name.")
        }

        else if(role != 8){
            $.ajax({
                url:"class/edit-role.php?teamId="+teamId+"&role="+role+"&otherRole=",
                method: "GET",
                dataType: "JSON",

                success:function(e){
                listMembers();
                }
            })
        }

        }

    //team edit color
    $(document).on("click",".btn-colors", function(){
        var teamName = $(this).parent().data('teamname');
        var color = $(this).data('color');
        var proj = $(this).data('project');
        var teamId = $(this).data('teamid');

        var setColor = "";

        //swal.fire(teamName);

        if(color == 1){setColor = 'red'}
        else if(color == 2){setColor = 'blue'}
        else if(color == 3){setColor = 'yellow'}
        else if(color == 4){setColor = 'violet'}
        else if(color == 5){setColor = 'orange'}
        else if(color == 6){setColor = 'green'}
        else if(color == 7){setColor = 'magenta'}
        else if(color == 8){setColor = 'indigo'}
        else if(color == 9){setColor = 'yellowgreen'}
        else if(color == 10){setColor = 'chartreuse'}
        else if(color == 11){setColor = 'aqua'}
        else if(color == 12){setColor = 'aquamarine'}
        else if(color == 13){setColor = 'black'}
        else if(color == 14){setColor = 'chocolate'}
        else if(color == 15){setColor = 'brown'}
        else if(color == 16){setColor = 'peru'}
        else if(color == 17){setColor = 'fuchsia'}
        else if(color == 18){setColor = 'gold'}
        else if(color == 19){setColor = 'lime'}
        else if(color == 20){setColor = 'purple'}
        

        $.ajax({
            url:"class/edit-color.php?teamId="+teamId+"&projId="+proj+"&color="+setColor+"&teamName="+teamName,
            method: "GET",
            dataType: "JSON",

            success:function(e){
                if(e == "taken")
                {
                    swal.fire("color has been taken");
                }
                else{
                    listMembers();
                }
            }
        })

    });

    //summery array method
    function summaryCount(){
        $.ajax({
            url:"class/summary-count.php",
            method: "GET",
            dataType: "JSON",

            success:function(e){
               
                $(e).each(function(key, value){
                    $(".hid_pending").val(value.pending);
                    $(".hid_todo").val(value.todo);
                    $(".hid_inprogress").val(value.inprogress);
                    $(".hid_done").val(value.done);

                    $(".hid_should").val(value.should);
                    $(".hid_could").val(value.could);
                    $(".hid_maybe").val(value.maybe);
                    $(".hid_unset").val(value.unset);

                    $(".total_done").html(value.done+" Finished");
                    $(".total_report").html(value.report+" Reports");
                    $(".total_created").html(value.created+" Created");

                    if(value.newReport == 0){
                        $('.total_new_report').hide();
                        $(".notif_report").html(value.newReport);
                    }
                    else
                    {
                        $('.total_new_report').show();
                        $(".notif_report").html(value.newReport);
                    }

                    if(value.resign == 0){
                        $('.total_request_report').hide();
                        $(".request_report").html(value.resign);
                    }
                    else
                    {
                        $('.total_request_report').show();
                        $(".request_report").html(value.resign);
                    }

                    if(value.team == 1){
                        $(".total_member").html(value.team+" Member");
                    }
                    else{
                        $(".total_member").html(value.team+" Members");
                    }
                    

                    summaryOut();
                })
            }
        })
    }

    //role check
    function checkRole(){
        var roleId = <?php echo $roleId;?>;

        var html="<input type='hidden' class='picNum' name='' value='18'>";
            html+="<div class='container_help'><img class='help_image' src='tutorial_pics/18.JPG' alt=''></div>";
            html+="<Button onclick='prevPic()'>Prev</Button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<Button onclick='nextPic()'>Next</Button>";
            /*var html ="<div class='black2' style='display: none;'>";
            html+= "<div class='outerclose' onclick='form_close()'></div>";
            html+= "<div class='window2' style='display: none;'>";
            html+= "<div class='how_to_use' style='display: none;'>";
            html+= "<img class='close_button' onclick='form_close()' src='css/close.png' alt='X'>";
            html+= "<input type='hidden' class='picNum' name='' value='18'>";
            html+= "<h4 style='color:white;'>How to use Flow Plan?</h3>";
            html+= "<div class='container_help'>";
            html+= "<img class='help_image' src='tutorial_pics/18.JPG' alt=''>";
            html+= "</div>";
            html+= "<Button onclick='prevPic()'>Prev</Button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<Button onclick='nextPic()'>Next</Button>";
            html+= "</div></div></div>";*/
        if(roleId != 1){
            

            //story window
            $("div.checkedRole").html("");
            $("div.container_help").html(html);
            $("tr.product_tblData2").html("");
        }
    }

    //veiw members
    function listMembers(){
        var projectId = <?php echo $myProjectId;?>;

        $.ajax({
                url:"class/list-members.php?projectId="+projectId,
                method: "GET",
                dataType: "JSON",

                success:function(e){

                    var html= "";
                    var htmlDrop= "";
                    var boardDrop1 = "<div data-taskId='0' data-color='All' data-Name='all' style='background-color:white;' class='fileter_select_member'>All</div>";
                        boardDrop1+= "<div data-taskId='0' data-color='Gray' data-Name='unset' style='background-color:gray;' class='fileter_select_member'>Unset</div>";
                    var boardDrop = "";
                    var x = 0;
                    var asOwner = "";

                    if(e != "")
                    {
                            $(e).each(function(key, value){
                                var num = x++;

                                var rolepick ="<div class='role-selection' style='display:none'>";
                                    rolepick+="<div onclick='editRole("+value.teamId+", 2)' class='roles-edit'>Product Owner</div>";
                                    rolepick+="<div onclick='editRole("+value.teamId+", 7)' class='roles-edit'>Client</div>";
                                    rolepick+="<div onclick='editRole("+value.teamId+", 4)' class='roles-edit'>Software Engineer</div>";
                                    rolepick+="<div onclick='editRole("+value.teamId+", 3)' class='roles-edit'>Quality Assurance</div>";
                                    rolepick+="<div onclick='editRole("+value.teamId+", 5)' class='roles-edit'>Designer</div>";
                                    rolepick+="<div class='roles-edit'>Others:<br><input type='text' maxlength='20' class='otherRole roleVal"+value.teamId+"'><div class='otherMemberBtn' onclick='editRole("+value.teamId+", 8)'>OK</div></div>";
                                    rolepick+="</div>";

                                var colorpick = "<div data-teamName='"+value.teamName+"' class='pickcolor' style='display:none'>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=1 style='background-color:red' class='btn-colors'></button>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=2 style='background-color:blue' class='btn-colors'></button>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=3 style='background-color:yellow' class='btn-colors'></button>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=4 style='background-color:violet' class='btn-colors'></button>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=5 style='background-color:orange' class='btn-colors'></button>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=6 style='background-color:green' class='btn-colors'></button>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=7 style='background-color:magenta' class='btn-colors'></button>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=8 style='background-color:indigo' class='btn-colors'></button>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=9 style='background-color:yellowgreen' class='btn-colors'></button>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=10 style='background-color:chartreuse' class='btn-colors'></button><br>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=11 style='background-color:aqua' class='btn-colors'></button>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=12 style='background-color:aquamarine' class='btn-colors'></button>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=13 style='background-color:black' class='btn-colors'></button>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=14 style='background-color:chocolate' class='btn-colors'></button>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=15 style='background-color:brown' class='btn-colors'></button>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=16 style='background-color:peru' class='btn-colors'></button>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=17 style='background-color:fuchsia' class='btn-colors'></button>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=18 style='background-color:gold' class='btn-colors'></button>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=19 style='background-color:lime' class='btn-colors'></button>";
                                colorpick+="<button data-teamId="+value.teamId+" data-project="+value.projectId+" data-color=20 style='background-color:purple' class='btn-colors'></button>";
                                colorpick+="</div>";  
                            
                            var rolename = "";
                            if(value.roleId==1){rolename = "Scrum Master"}
                            if(value.roleId==2){rolename = "Product Owner"}
                            if(value.roleId==3){rolename = "Quality Assurance"}
                            if(value.roleId==4){rolename = "Software Engineer"}
                            if(value.roleId==5){rolename = "Designer"}
                            if(value.roleId==6){rolename = "Not Assigned"}
                            if(value.roleId==7){rolename = "Client"}
                            if(value.roleId==8){rolename = value.DynamicMember}
                            
                            //PROFILE
                            html+="<div class='Member'>";
                            html+="<div class='MemberImage'><img class='member_pic' src="+value.image+" alt='img'></div>";
                            html+="<div class='MemberName'>"+value.teamName+"</div>";
                            //COLOR, ROLE, ACTION
                            if(<?php echo $roleId; ?> != value.roleId){
                            html+="<div class='MemberRole'>";
                                if(value.request_Indicator == 1){var request = "<button onclick='declineMember("+value.teamId+")' class='MemberAction MemberDecline'>Decline</button><br>Requested to resign to the project.";}
                                else{var request = "";}
                            html+="<span class='MemberColor'>"+colorpick+"Color: <div style='background-color:"+value.color+"' class='memberrole-color'></div><br><br>Position: <span class='RoleNames'>"+rolename+"</span>"+rolepick+"</span><br><br><button onclick='removeMember("+value.teamId+")' class='MemberAction'>Remove</button> <span style='color:red;font-style:italic'>"+request+"</span>";
                            html+="</div>";
                            }
                            else{
                            html+="<div class='MemberRole'>";
                            html+="<span class='MemberColor'>"+colorpick+"Color: <div style='background-color:"+value.color+"' class='memberrole-color'></div><br><br>Position: <span class='RoleNames'>"+rolename+"</span></span><br>&nbsp;&nbsp;&nbsp;";
                            html+="</div>";
                            }
                            html+="</div>";
                            //MEMBER NAME
                            if(<?php echo $roleId; ?> == 1){
                            htmlDrop+="<div data-member='"+value.teamName+"' data-color="+value.color+" class='AssignedMember'>"+value.teamName+"</div>";
                            }

                            if(<?php echo $roleId; ?>==1){
                                asOwner = value.color;
                                $('.role-color').css('background-color', asOwner);
                            }
                            else{
                                $('.role-color').css('background-color', '<?php echo $session_color;?>');
                            }

                            boardDrop+="<div data-teamId='"+value.teamId+"' data-color='"+value.color+"' data-Name='"+value.teamName+"' style='background-color:"+value.color+";' class='fileter_select_member'>"+value.teamName+"</div>";
                            $(".listMembers").html(html);
                            $(".changeOwner").html(htmlDrop);
                            $(".filter_dropdown").html(boardDrop1+boardDrop);
                                
                        });
                    }
                    else
                    {
                        $(".listMembers").html(html);
                    }
                }
            })
    }

    //invite email
    function invite(){
        var projectId = <?php echo $myProjectId;?>;
        var email = $(".searchMem").val();
        var projectname = $(".hidden_proj_name").val();

        if (email == ""){
            swal.fire("Email address is required!");
        }
        else{
            $.ajax({
                url:"class/invite-member.php?projectId="+projectId+"&email="+email+"&projname="+projectname,
                method: "GET",
                dataType: "JSON",

                success:function(e){
                    if(e == "invalid email")
                    {
                        swal.fire("Improper format of email address");
                    }
                    else if(e == "emailTaken")
                    {
                        swal.fire("You already invited this email address to your project");
                    }
                    else
                    {
                        swal.fire("Request has been successfully added to your project");
                        $(".searchMem").val("");
                    }
                }
            })
        }
    }

    //delete story
    function abortStory(){
        var productId =  $("input.edit-productId").val();
        let warn = "Are you sure do you want to abort this story and the task inside of it?";

        swal.fire({
          title: 'Confirmation',
          text: warn,
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Remove this story!'
        }).then((result)=>{
          if(result.isConfirmed){
            $.ajax({
                url:"class/delete-story.php?prodid="+productId,
                method: "GET",
                dataType: "JSON",

                success:function(e){
                    swal.fire("The story has been successfully removed to your project.");
                    $(".window").hide();
                    $(".black").fadeOut();
                    form_close();
                    showProjectStories();
                }
            })
          }
        })
    }


    //delete task
    function deleteTask(){
        var taskId = $("input.editTask-taskId").val();
        var product = $("input.editTask-productId").val();
        var project = $("input.editTask-projectId").val();

        $.ajax({
                url:"class/delete-task.php?taskId="+taskId,
                method: "GET",
                dataType: "JSON",

                success:function(e){
                    $(".black").fadeOut();
                    $(".editTaskWindow").hide();
                    $(".window").hide();

                    //view task of the story
                    $.ajax({
                        url:"class/task-list.php?prodid="+product+"&projid="+project,
                        method: "GET",
                        dataType: "JSON",

                        success:function(e){
                            var html = "";
                            var className = "tbody.taskStories"+product;

                            if(e == "none")
                                {
                                    $(className).html("");
                                    $(className).hide();
                                    $(".edit_sprint_task").val("");
                                    $(".edit_sprint_define").val("");
                                    $(".edit_sprint_time").val("");
                                }
                            else
                                {
                            $(e).each(function(key, value){

                                    taskName = value.taskName;
                                    taskName = taskName.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                                    targetName = value.targetName;
                                    targetName = targetName.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                                
                                    html+="<tr class='taskInfo' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>";
                                    html+="<td class='T_sprint_task'>"+taskName+"</td>";
                                    html+="<td class='T_sprint_done'>"+targetName+"<div class='Sprint_role4' style='background-color:"+value.color+"'></div></td>";
                                    html+="<td class='T_sprint_time'>"+value.taskTime+" Hours</td>";
                                    html+="</tr>";

                                    $(className).html(html);
                                    $(".edit_sprint_task").val("");
                                    $(".edit_sprint_define").val("");
                                    $(".edit_sprint_time").val("");
                                
                            });
                                }
                        }
                    })
                }
            })
    }


    //edit task
    function editTask(){
        var taskId = $("input.editTask-taskId").val();
        var product = $("input.editTask-productId").val();
        var project = $("input.editTask-projectId").val();
        var task = $("textarea.edit_sprint_task").val();
        var target = $("textarea.edit_sprint_define").val();
        var time = $("input.edit_sprint_time").val();

        if(task == ""){
            swal.fire("Incomplete Information, Task name is required please fill in the blanks");
        }
        else if(target == ""){
            swal.fire("Incomplete Information, Definition of done is required please fill in the blanks");
        }
        else if(time == ""){
            swal.fire("Incomplete Information, Task time is required please fill in the blanks");
        }
        else
        {
            //edit task of the story
            $.ajax({
                url:"class/edit-task.php?taskId="+taskId+"&task="+task+"&define="+target+"&time="+time+"&comment=",
                method: "GET",
                dataType: "JSON",

                success:function(e){
                    $(".black").fadeOut();
                    $(".editTaskWindow").hide();
                    $(".window").hide();

                    //view task of the story
                    $.ajax({
                        url:"class/task-list.php?prodid="+product+"&projid="+project,
                        method: "GET",
                        dataType: "JSON",

                        success:function(e){
                            var html = "";
                            var className = "tbody.taskStories"+product;

                            $(e).each(function(key, value){

                                taskName = value.taskName;
                                taskName = taskName.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                                targetName = value.targetName;
                                targetName = targetName.replace(/</g, "&lt;").replace(/>/g, "&gt;");

                                html+="<tr class='taskInfo' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>";
                                html+="<td class='T_sprint_task'><p class='dataWordbreak'>"+taskName+"</p></td>";
                                html+="<td class='T_sprint_done'><p class='dataWordbreak'>"+targetName+"</p><div class='Sprint_role4' style='background-color:"+value.color+"'></div></td>";
                                html+="<td class='T_sprint_time'><p class='dataWordbreak'>"+value.taskTime+" Hours</p></td>";
                                html+="</tr>";   

                                $(className).html(html);
                                $(".edit_sprint_task").val("");
                                $(".edit_sprint_define").val("");
                                $(".edit_sprint_time").val("");
                                $("#esetTimerAccu")[0].reset();
                            });
                        }
                    })
                }
            })
        }
    }

    //view comments
    $(document).on("mouseover",".task_data",function(){
        
        var taskId = $(this).data('id');
        var teamName = $(this).data('team');
        var commentTrigger = $(this).data('iscom');

        if(commentTrigger == 1){
            if(teamName == "<?php echo $profile_name;?>")
            {
                $.ajax({
                    url:"class/view-commentTrigger.php?taskId="+taskId,
                    method: "GET",
                    dataType: "JSON",

                    success:function(e){
                        //change comment color
                        var comment = $(this).children(".comment").html();
                        if(comment != ""){
                            $(this).css({"margin-bottom": "50px"});
                            $(this).children(".comment").show();
                            $(this).children(".commentIndicator").css({"background": "rgb(113, 105, 105)"});
                        }
                    }
                })
            }
        }
    });


    //instant delete task
    function ideleteTask(){
        var taskId = $("input.ieditTask-taskId").val();
        var product = $("input.ieditTask-productId").val();
        var project = $("input.ieditTask-projectId").val();

        $.ajax({
                url:"class/delete-task.php?taskId="+taskId,
                method: "GET",
                dataType: "JSON",

                success:function(e){
                    $(".black").fadeOut();
                    $(".instantEditTaskWindow").hide();
                    $(".window").hide();

                    //view task of the story
                    $.ajax({
                        url:"class/task-list.php?prodid="+product+"&projid="+project,
                        method: "GET",
                        dataType: "JSON",

                        success:function(e){

                            $(".iedit_sprint_task").val("");
                            $(".iedit_sprint_define").val("");
                            $(".iedit_sprint_time").val("");  
                            
                            scrumTask();
                            //scrumTodo();
                            //scrumInProgress();
                            //scrumDone();               
                                
                        }
                    })
                }
            })
    }


    //instant edit task
    function ieditTask(){
        var taskId = $("input.ieditTask-taskId").val();
        var product = $("input.ieditTask-productId").val();
        var project = $("input.ieditTask-projectId").val();
        var task = $("textarea.iedit_sprint_task").val();
        var target = $("textarea.iedit_sprint_define").val();
        var time = $("input.iedit_sprint_time").val();

        var comment = $("textarea.iadd_comment").val();

        if(task == ""){
            swal.fire("Incomplete Information, Task name is required please fill in the blanks");
        }
        else if(target == ""){
            swal.fire("Incomplete Information, Definition of done is required please fill in the blanks");
        }
        else if(time == ""){
            swal.fire("Incomplete Information, Task time is required please fill in the blanks");
        }
        else
        {
            //edit task of the story
            $.ajax({
                url:"class/edit-task.php?taskId="+taskId+"&task="+task+"&define="+target+"&time="+time+"&comment="+comment,
                method: "GET",
                dataType: "JSON",

                success:function(e){
                    $(".black").fadeOut();
                    $(".instantEditTaskWindow").hide();
                    $(".window").hide();
                    $("textarea.iadd_comment").val("");
                    $("#iesetTimerAccu")[0].reset();
                    scrumTask();
                    //scrumTodo();
                    //scrumInProgress();
                    //scrumDone();
                }
            })
        }
    }

    //intant add task
    function instantaddTask(){
        var sprint_task = $(".sprint_itask").val();
        var sprint_define = $(".sprint_idefine").val();
        var sprint_time = $(".sprint_itime").val();
        var projectId = <?php echo $myProjectId;?>;
        var sprintfilter = $(".hid_filter_sprint").val();

        var sprint_number = $(".hid_filter_sprint").val();

        if(sprint_task == ""){
            swal.fire("Incomplete Information, Task name is required please fill in the blanks");
        }
        else if(sprint_define == ""){
            swal.fire("Incomplete Information, Definition of done is required please fill in the blanks");
        }
        else if(sprint_time == ""){
            swal.fire("Incomplete Information, Task time is required please fill in the blanks");
        }
        else if(sprintfilter == ""){
            swal.fire("Please select a sprint to add a task");
            $(".sprint_board").toggle();
            form_close();
        }
        else
        {
            $.ajax({
                url:"class/instant-add-task.php?projid="+projectId+"&task="+sprint_task+"&define="+sprint_define+"&time="+sprint_time+"&currentSprint="+sprint_number,
                method: "GET",
                dataType: "JSON",

                success:function(e){
                    $(".black").fadeOut();
                    $(".instantAddTaskWindow").hide();
                    $(".window").hide();
                    scrumTask();
                    //scrumTodo();
                    //scrumInProgress();
                    //scrumDone();

                    $(".sprint_itask").val("");
                    $(".sprint_idefine").val("");
                    $(".sprint_itime").val("");
                    $("#isetTimerAccu")[0].reset();
                }
            })
        }

    }

    //add task
    function addTask(){
        var sprint_task = $(".sprint_task").val();
        var sprint_define = $(".sprint_define").val();
        var sprint_time = $(".sprint_time").val();

        var addtaskproductId = $(".addtask-productId").val();
        var addtaskprojectId = $(".addtask-projectId").val();

        if(sprint_task == ""){
            swal.fire("Incomplete Information, Task name is required please fill in the blanks");
        }
        else if(sprint_define == ""){
            swal.fire("Incomplete Information, Definition of done is required please fill in the blanks");
        }
        else if(sprint_time == ""){
            swal.fire("Incomplete Information, Task time is required please fill in the blanks");
        }
        else
        {
            $.ajax({
                url:"class/add-task.php?prodid="+addtaskproductId+"&projid="+addtaskprojectId+"&task="+sprint_task+"&define="+sprint_define+"&time="+sprint_time,
                method: "GET",
                dataType: "JSON",

                success:function(e){
                    $(".black").fadeOut();
                    $(".addTaskWindow").hide();
                    $(".window").hide();

                    //view task of the story
                    $.ajax({
                        url:"class/task-list.php?prodid="+addtaskproductId+"&projid="+addtaskprojectId,
                        method: "GET",
                        dataType: "JSON",

                        success:function(e){
                            var html = "";
                            var className = "tbody.taskStories"+addtaskproductId;

                            $(e).each(function(key, value){
                                taskName = value.taskName;
                                taskName = taskName.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                                targetName = value.targetName;
                                targetName = targetName.replace(/</g, "&lt;").replace(/>/g, "&gt;");

                                html+="<tr class='taskInfo' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>";
                                html+="<td class='T_sprint_task'><p class='dataWordbreak'>"+taskName+"</p></td>";
                                html+="<td class='T_sprint_done'><p class='dataWordbreak'>"+targetName+"</p><div class='Sprint_role4' style='background-color:"+value.color+"'></div></td>";
                                html+="<td class='T_sprint_time'><p class='dataWordbreak'>"+value.taskTime+" Hours</p></td>";
                                html+="</tr>";   

                                $(className).html(html);
                                $(".sprint_task").val("");
                                $(".sprint_define").val("");
                                $(".sprint_time").val("");
                                $("#setTimerAccu")[0].reset();
                            });
                        }
                    })
                }
            })
        }

    }

    $(document).on("click",".myStorySprint",function(){
        $(this).next().slideToggle();
        var productId = $(this).data("product");
        var projectId = $(this).data("project");
        
        //view task of the story
        $.ajax({
            url:"class/task-list.php?prodid="+productId+"&projid="+projectId,
            method: "GET",
            dataType: "JSON",

            success:function(e){
                var html = "";
                var className = "tbody.taskStories"+productId;

                $(e).each(function(key, value){
                    targetName = value.targetName;
                    targetName = targetName.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                    taskName = value.taskName;
                    taskName = taskName.replace(/</g, "&lt;").replace(/>/g, "&gt;");

                    html+="<tr class='taskInfo' data-time='"+value.taskTime+"' data-target='"+value.targetName+"' data-task='"+value.taskName+"' data-id='"+value.taskId+"' data-product='"+value.productId+"' data-project='"+value.projectId+"'>";
                    html+="<td class='T_sprint_task'><p class='dataWordbreak'>"+taskName+"</p></td>";
                    html+="<td class='T_sprint_done'><p class='dataWordbreak'>"+targetName+"</p><div class='Sprint_role4' style='background-color:"+value.color+"'></div></td>";
                    html+="<td class='T_sprint_time'><p class='dataWordbreak'>"+value.taskTime+" Hours</p></td>";
                    html+="</tr>";   

                    $(className).html(html); 
                });
            }
        })

    });

    //Call sprint number
    function openSprint(sprint_id){
    $(".sprintList").hide();
    $(".sprintData").show();
    
    var html3 = "<div class='btnbackSprint'>";
    html3+="<button onclick='closeSprint()' class='backSprint'>Back To Sprints</button></div>";

    $(".sprintData").html(html3+"<h4>No story is found on this sprint. To add you must set the sprint number of the story in the <span style='color:lightblue;cursor:pointer' class='sprint_product_menu'> PRODUCT BACKLOG</span>.</h4>");
    var projectId = "<?php echo $myProjectId;?>";

    var sprintCheck = $(".hid_filter_timer").val();
    //to appear product only

        $.ajax({
                url:"class/sprint-list.php?id="+projectId+"&sprint="+sprint_id,
                method: "GET",
                dataType: "JSON",

                success:function(e){
                    var html = "";

                    var roleId = <?php echo $roleId;?>;

                    var html2 = "<div class='btnbackSprint'>";
                    html2+="<button onclick='closeSprint()' class='backSprint'>Back To Sprints</button>";
                    if(roleId == 1){
                        if(sprint_id == sprintCheck){
                            html2+="&nbsp;&nbsp;&nbsp;<button onclick='startSprint("+sprint_id+")' class='backSprint extendSprint'>Extend the sprint</button>";
                        }
                        else
                        {
                            html2+="&nbsp;&nbsp;&nbsp;<button onclick='startSprint("+sprint_id+")' class='backSprint extendSprint'>Start new sprint</button>";
                        }                        
                        html2+="&nbsp;&nbsp;<input class='setSprintDue' type='number' min='1' max='100' maxlength='3' value='1'>&nbsp;<Strong class='adjustDWoutput'>Weeks</Strong> <Strong class='adjustDW' onclick='adjustDW()'>Change to days</Strong>"
                    }
                    //html2+="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='dateTimeTrack'></span>";
                    html2+="</div>";

                    $(e).each(function(key, value){
                        Objective = value.Objective;
                        Objective = Objective.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                        Stories = value.Stories;
                        Stories = Stories.replace(/</g, "&lt;").replace(/>/g, "&gt;");

                        
                            if(e == "none")
                            {
                                html+="<h2>No story is found on this sprint. To add you must set the sprint number of the story in the PRODUCT BACKLOG.</h2>";
                            }
                            else{
                                if(value.Stories != "instantStoryMakerforInstantTask"){
                                    html+="<div class='useStory'><div class='myStorySprint'  data-product="+value.ProductID+" data-project="+value.projectId+">As a "+value.entity+" I want to able to "+Stories+" So that I can "+Objective+"</div>";
                                    html+="<div class='storytask' style='display:none;'><p>Story Task</p>";
                                    html+="<table class='storyTable'>";
                                    html+="<thead>";
                                    html+="<tr>";
                                    html+="<th class='H_sprint_task'>Task</th>";
                                    html+="<th class='H_sprint_done'>Definition of Done</th>";
                                    html+="<th class='H_sprint_time'>Acummulated Time</th>";
                                    html+="</tr>";
                                    html+="</thead>";
                                    html+="<tbody class='taskStories"+value.ProductID+"'>";
                                    /*html+="<tr>";
                                    html+="<td class='T_sprint_task'>Website Mockup</td>";
                                    html+="<td class='T_sprint_done'>Finished Website Mockup<div class='Sprint_role4'></div></td>";
                                    html+="<td class='T_sprint_time'>8 Hours</td>";
                                    html+="</tr>";
                                    html+="<tr>";
                                    html+="<td class='T_sprint_task'>Website Backend</td>";
                                    html+="<td class='T_sprint_done'>Functional Website Mockup<div class='Sprint_role4'></div></td>";
                                    html+="<td class='T_sprint_time'>108 Hours</td>";
                                    html+="</tr>";
                                    html+="<tr>";
                                    html+="<td class='T_sprint_task'>Database for the website</td>";
                                    html+="<td class='T_sprint_done'>Storage for the Website<div class='Sprint_role1'></div></td>";
                                    html+="<td class='T_sprint_time'>10 Hours</td>";
                                    html+="</tr>";*/
                                    html+="</tbody>";
                                    html+="</table>";
                                    if(<?php echo $roleId;?> == 1){
                                    html+="<div class='task taskAdd' data-product="+value.ProductID+" data-project="+value.projectId+">&nbsp;&nbsp;Add New Task</div>";
                                    }
                                    html+="</div>";
                                    html+="</div>";
                                }
                                else{
                                    html+="<div class='useStory'><div class='myStorySprint'  data-product="+value.ProductID+" data-project="+value.projectId+">Miscellaneous tasks</div>";
                                    html+="<div class='storytask' style='display:none;'><p>Story Task</p>";
                                    html+="<table class='storyTable'>";
                                    html+="<thead>";
                                    html+="<tr>";
                                    html+="<th class='H_sprint_task'>Task</th>";
                                    html+="<th class='H_sprint_done'>Definition of Done</th>";
                                    html+="<th class='H_sprint_time'>Acummulated Time</th>";
                                    html+="</tr>";
                                    html+="</thead>";
                                    html+="<tbody class='taskStories"+value.ProductID+"'>";
                                    /*html+="<tr>";
                                    html+="<td class='T_sprint_task'>Website Mockup</td>";
                                    html+="<td class='T_sprint_done'>Finished Website Mockup<div class='Sprint_role4'></div></td>";
                                    html+="<td class='T_sprint_time'>8 Hours</td>";
                                    html+="</tr>";
                                    html+="<tr>";
                                    html+="<td class='T_sprint_task'>Website Backend</td>";
                                    html+="<td class='T_sprint_done'>Functional Website Mockup<div class='Sprint_role4'></div></td>";
                                    html+="<td class='T_sprint_time'>108 Hours</td>";
                                    html+="</tr>";
                                    html+="<tr>";
                                    html+="<td class='T_sprint_task'>Database for the website</td>";
                                    html+="<td class='T_sprint_done'>Storage for the Website<div class='Sprint_role1'></div></td>";
                                    html+="<td class='T_sprint_time'>10 Hours</td>";
                                    html+="</tr>";*/
                                    html+="</tbody>";
                                    html+="</table>";
                                    if(<?php echo $roleId;?> == 1){
                                    html+="<div class='task taskAdd' data-product="+value.ProductID+" data-project="+value.projectId+">&nbsp;&nbsp;Add New Task</div>";
                                    }
                                    html+="</div>";
                                    html+="</div>";
                                }
                            }


                        $(".sprintData").html(html2+html);
                    });
                }
        })

    }

    //edit story
    function saveStory(){
        var projectId = "<?php echo $myProjectId;?>";
        var productId =  $("input.edit-productId").val();
        var asA = $(".asA").val();
        var iWantTo = $(".iWantTo").val();
        var soThat = $(".soThat").val();
        var sprint_change = $(".sprint_change").val();
        var status_change = "";//$(".status_change").val();
        var sprint = $(".hid_filter_timer").val();
        var priority_change = $(".priority_change").val();
        
        if(iWantTo == ""){
            swal.fire("'I want to able to...' Field is Missing.");
        }
        else if(soThat == ""){
            swal.fire("'So that I can... ' Field is Missing.");
        }
        else{
            $.ajax({
                url: "class/edit-story.php?prodId="+productId+"&asA="+asA+"&iWantTo="+iWantTo+"&soThat="+soThat+"&sprint="+sprint_change+"&status="+status_change+"&priority="+priority_change+"&run_sprint="+sprint,
                method: "GET",
                dataType: "JSON",

                success:function(e){
                    //swal.fire("Success");
                    if(e == "same"){
                        swal.fire("This story is currently in the running Sprint");
                    }
                    else{
                        swal.fire("Story Feature has been Updated!");
                        $(".window").hide();
                        $(".black").fadeOut();
                        $("#defaultStoryStatus")[0].reset();
                        form_close();
                        showProjectStories();
                    }
                }
            })
        }
    }

    //add sprint
    function addSprint(){
        var projectId = "<?php echo $myProjectId;?>";
        
        $.ajax({
            url: "class/add-sprint.php?projId="+projectId,
            method: "GET",
            dataType: "JSON",

            success:function(e){
                if (e == "limit") {
                    swal.fire("limited of 10 sprints only");
                    showSprint();
                }
                else
                {
                    showSprint();
                }
                
            }
        })

    }

    //display sprint
    function showSprint(){

        var id = "<?php echo $myProjectId;?>";
        $.ajax({
            url: "class/show-sprint.php?projId="+id,
            method: "GET",
            dataType: "JSON",

            success:function(e){
                var html = "";
                var option = "<option value=''>--------</option>";
                var option2 = "<option value='All'>All</option>";
                var html2 = "";
                var boardSprint = "";
                

                var roleId = <?php echo $roleId;?>;
                if(roleId == 1){
                    html2+= "<div onclick='addSprint()' class='sprint_num'>";
                    html2+="<div class='sprint_name Sprint_plus'>+</div>";
                    html2+="<div class='sprint_week'>Add New Sprint</div>";
                    html2+="</div>";    
                }

                if(e == "")
                {
                    $(".sprintList").html(html2);
                    $(".sprint_change").html(option);
                    $(".sprint_board").html(boardSprint);   
                }

                else{

                $(e).each(function(key, value){

                    if(value.sprintNumber != 0){
                        html+="<div onclick='openSprint("+value.sprintNumber +")' class='sprint_num'>";
                        if(<?php echo $roleId?> == 1){
                            html+="<img src='css/close.png' class='delete_sprint' style='display:none;' alt='X' onclick='deleteSprint("+value.sprintNumber+")'>";
                        }
                        html+="<div class='sprint_name'>Sprint "+value.sprintNumber+"</div>";
                        //html+="<div class='sprint_week'>"+value.sprintTime+" Hours</div>";
                        html+="</div>";

                        boardSprint+="<div onclick='getboardSprint("+value.sprintNumber+")' class='sprintBoard'>Sprint "+value.sprintNumber+"</div>"
                    }

                    if(value.sprintNumber != 0){
                        option+="<option value='"+value.sprintNumber+"'>"+value.sprintNumber+"</option>";
                        option2+="<option value='"+value.sprintNumber+"'>"+value.sprintNumber+"</option>";
                    }
                    else{
                        option+="<option value='"+value.sprintNumber+"'>Unset</option>";
                        option2+="<option value='"+value.sprintNumber+"'>Unset</option>";
                    }

                    $(".sprintList").html(html+html2);
                    $(".sprint_change").html(option);
                    $(".filterSprints").html(option2);
                    
                    if(<?php echo $roleId;?> == 1){
                        $(".sprint_board").html(boardSprint);
                    }
                    else{$(".sprint_board").html("");}
                });
                
                }
            }
        })

    }

    //create stories
    function createMyStories(){
        var myStory = $("#myStory").val();
        var myObjective = $("#myObjective").val();
        var projectId = "<?php echo $myProjectId;?>";

        if(myStory == "" || myObjective == "")
        {
            //swal.fire("Field is Require to create your story.");
            myStory = "Untitled Story name";
            myObjective = "Untitled Story objective";

            $.ajax({
                url: "class/create-story.php?story="+myStory+"&obj="+myObjective+"&projId="+projectId,
                method: "GET",
                dataType: "JSON",

                success:function(e){
                    if(e != "max"){
                        $("#myStory").val("");
                        $("#myObjective").val("");
                        showProjectStories();
                    }
                    else
                    {
                        swal.fire("You cannot create Stories anymore. The Create Story and Miscellaneous is limit of 50 Stories only.");
                    }
                }
            })
        }
        else
        {
            $.ajax({
                url: "class/create-story.php?story="+myStory+"&obj="+myObjective+"&projId="+projectId,
                method: "GET",
                dataType: "JSON",

                success:function(e){
                    $("#myStory").val("");
                    $("#myObjective").val("");
                    showProjectStories();
                }
            })
        }
    }


    //project Stories Datas
    function showProjectStories(){
        var projectId = "<?php echo $myProjectId;?>";
        var userID = "<?php echo $profile_name;?>";
        var filterSprints = $('#filterSprints').val();
        var filterPriorities = $('#filterPriorities').val();
        var filterStatus = $('#filterStatus').val();

        //swal.fire(filterSprints);

        if(filterSprints == ""){filterSprints="All";}
        if(filterPriorities == ""){filterPriorities="All";}
        if(filterStatus == ""){filterStatus="All";}

        $.ajax({
            url:"class/story-list.php?id="+projectId+"&name="+userID+"&filterSprints="+filterSprints+"&filterPriorities="+filterPriorities+"&filterStatus="+filterStatus,
            method: "GET",
            dataType: "JSON",

            success:function(e){
                var html = "";
                var sprint ="Unset";

                if(e == ""){
                    $(".gentblStory").html(html);
                }
                else{
                    $(e).each(function(key, value){
                        Objective = value.Objective;
                        Objective = Objective.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                        Stories = value.Stories;
                        Stories = Stories.replace(/</g, "&lt;").replace(/>/g, "&gt;");

                        if(value.Stories != "instantStoryMakerforInstantTask"){
                            html+="<tr class='product_tblData' data-id='"+value.ProductID+"' data-entity='"+value.entity+"'  data-story='"+value.Stories+"'  data-obj='"+value.Objective+"'>";
                            
                            if(value.sprint_number != 0){
                                html+="<td class='t_sprint'>"+value.sprint_number+"</td>";
                            }
                            else{
                                html+="<td class='t_sprint'>"+sprint+"</td>";
                            }
                            html+="<td class='t_entity'>"+value.entity+"</td>";
                            html+="<td class='t_story'>"+Stories+"</td>";
                            html+="<td class='t_obj'>"+Objective+"</td>";
                            html+="<td class='t_prio'>"+value.priority+"</td>";
                            html+="<td class='t_status'>"+value.status+"</td>";
                            html+="</tr>";
                        }

                        $(".gentblStory").html(html);
                    });
                }
            }
        })
    }

    //project info
    function showProjectInfo(){
        var projectId = "<?php echo $myProjectId;?>";
        var hidSprint = $("hid_filter_sprint").val();

        $.ajax({
            url: "class/project-info.php?id="+projectId,
            method: "GET",
            dataType: "JSON",

            success:function(e){
                $(e).each(function(key, value){
                    $(".hidden_proj_name").val(value.project);
                    $(".h4_projInfo1").text(value.project+" / Summary");
                    $(".h4_projInfo2").text(value.project+" / Product Backlog");
                    $(".h4_projInfo3").text(value.project+" / Sprint Backlog");
                    $(".h4_projInfo4").text(value.project+" / Scrum board");

                    if(value.currentSprint == 0 || value.currentSprint == null){
                        $(".hid_filter_sprint").val(1);    
                    }
                    else{
                        $(".hid_filter_sprint").val(value.currentSprint);
                    }
                    //swal.fire(value.currentSprint);
                    if(value.currenSprint != 0){
                        $(".hid_filter_timer").val(value.currentSprint);
                        $(".hid_filter_due").val(value.timeDue);
                    }
                    else if(value.currenSprint == 0){
                        
                    }
                })
            }
        })

    }

    $('.product_menu').click(function(){
        showProjectStories();
    });
    
    function loadTeamRole(){
        if(<?php echo $roleId; ?> != 1){
            var teamId =<?php echo $_SESSION["teamId"]; ?>

            if(<?php echo $roleId;?> == 8){
                $.ajax({
                    url:"class/loadTeamRole.php?teamId="+teamId,
                    type:"GET",
                    dataType: "JSON",

                    success:function(e){
                        $(e).each(function(key, value){
                            var dynamic = value.DynamicMember;
                            //alert(value.DynamicMember);
                            $(".role").html(dynamic);
                        });
                    }
                })
            }
        }
    }

     //Loader
     $(document).ready(function() {
      loadTeamRole();
      checkRole();
      loadProfile();
      showProjectInfo();
      showSprint();
      listMembers();
      summaryCount();
      showProjectStories();
      //workload();
      //loadWorkload();
      createdTask();
      finishedTask();
      roleRedirect();
    });

    setInterval(function(){
        countDown();
        //isMember();
        //isLogin();
    }, 1000);

    setInterval(function(){
        //scrumTask();
        //scrumTodo();
        //scrumInProgress();
        //scrumDone();
        isLogin();
    }, 5000);
</script>