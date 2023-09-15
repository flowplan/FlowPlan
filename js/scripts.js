//outside clicking
$(document).click(function(e) {
    var container = $(".task_data");
    if (!$(e.target).closest(container).length) {//target element
        $(".changeStatus").hide();
        $(".changeOwner").hide();
    }
});

$(document).click(function(e) {
    var container = $(".Member");
    if (!$(e.target).closest(container).length) {//target element
        $(".role-selection").hide();
        $(".pickcolor").hide();
    }
});

//Open Rename
$(document).on("click",".rename_proj",function(){

    var project = $(this).data('project');
    var projectId = $(this).data('id');

    $(".renameProject").show();
    $(".renameInput").val(project);
    $(".renameHidden").val(projectId);

    });

//Delete Project
$(document).on("click",".del_proj",function(){

    var project = $(this).data('project');
    var projectId = $(this).data('id');

    let warn = "Are you sure do you want to delete this project <b>''"+project+"''</b>? it will remove everything you save inside.";
        swal.fire({
          title: 'Confirmation',
          html: warn,
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete the project!'
        }).then((result)=>{
          if(result.isConfirmed){
            $.ajax({
                url:"class/delete-project.php?projId="+projectId,
                method: "GET",
                dataType: "JSON",

                success:function(e){
                  myProjects();
                }
            })
            swal.fire("Project Deleted.");
          }
        })

    });

//Leave Project
$(document).on("click",".del_proj_team",function(){

    var project = $(this).data('project');
    var projectId = $(this).data('id');

    let warn = "Are you sure do you want to leave on this project <b>''"+project+"''</b>? To leave the project you must wait for your scrum master approval.";
        swal.fire({
          title: 'Confirmation',
          html: warn,
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, send a Request'
        }).then((result)=>{
          if(result.isConfirmed){
            $.ajax({
                url:"class/resign-member.php?teamId="+projectId,
                method: "GET",
                dataType: "JSON",

                success:function(e){
                    myTeamProjectList();
                }
            })
            swal.fire({
                icon: "success",
                title: "Sent!!",
                html: "<p>Request has been sent to the <b>"+project+"'s</b> Scrum Master</p>"
            });
          }
        })

    });

//Close Rename
function renameCancel(){
    $(".renameInput").val("");
    $(".renameHidden").val("");
    $(".renameProject").hide();
}

//task members dropdown
$(document).on("click",".task_owner",function(){
        $(this).next().toggle(function(){
            listMembers();
        });
    });

//task status dropdown
$(document).on("click",".TaskStatus",function(){
    $(this).next().toggle();
    });


//instant call edit delete task
$(document).on("dblclick",".task_data, .task_data_done",function(){

    $(".black").fadeIn();
    $(".instantEditTaskWindow").show();
    $(".window").show();

    var taskId = $(this).data('id');
    var product = $(this).data('product');
    var project = $(this).data('project');
    var task = $(this).data('task');
    var target = $(this).data('target');
    var time = $(this).data('time');

    $("input.ieditTask-taskId").val(taskId);
    $("input.ieditTask-productId").val(product);
    $("input.ieditTask-projectId").val(project);
    $("textarea.iedit_sprint_task").val(task);
    $("textarea.iedit_sprint_define").val(target);
    $("input.iedit_sprint_time").val(time);


});

//call edit delete task
$(document).on("click",".taskInfo",function(){

    $(".black").fadeIn();
    $(".editTaskWindow").show();
    $(".window").show();

    var taskId = $(this).data('id');
    var product = $(this).data('product');
    var project = $(this).data('project');
    var task = $(this).data('task');
    var target = $(this).data('target');
    var time = $(this).data('time');

    $("input.editTask-taskId").val(taskId);
    $("input.editTask-productId").val(product);
    $("input.editTask-projectId").val(project);
    $("textarea.edit_sprint_task").val(task);
    $("textarea.edit_sprint_define").val(target);
    $("input.edit_sprint_time").val(time);


});

//call edit abort story
$(document).on("click",".product_tblData",function(){

    run_edit_story();
    var projId = $(this).data('id');
    var asA = $(this).data('entity');
    var story = $(this).data('story');
    var obj = $(this).data('obj');

    $("input.edit-productId").val(projId);
    $("input.asA").val(asA);
    $("textarea.iWantTo").val(story);
    $("textarea.soThat").val(obj);

});

//intant call add task
$(document).on("click",".btnInstaAdd",function(){
    $(".black").fadeIn();
    $(".instantAddTaskWindow").show();
    $(".window").show();

    var sprint_number = $(".hid_filter_sprint").val();
    var product_name = "instantTask";

});

//call add task
$(document).on("click",".taskAdd",function(){
    $(".black").fadeIn();
    $(".addTaskWindow").show();
    $(".window").show();

    var productId = $(this).data("product");
    var projectId = $(this).data("project");
    $(".addtask-productId").val(productId);
    $(".addtask-projectId").val(projectId);
});

$(document).ready(function(){
    const timeCHeck = new Date().getHours();
    var greeting;
    if (timeCHeck < 10) {
    greeting = "Good morning";
    } else if (timeCHeck < 20) {
    greeting = "Good day!";
    } else {
    greeting = "Good evening!";
    }
    $("#trackDay").html(greeting);

    $(".filter_member").click(function(){
        $(".filter_dropdown").toggle();
    });

    $(".filterSprint").click(function(){
        $(".sprint_board").toggle();
    });

    $(".sprint_board").click(function(){
        $(".sprint_board").hide();
    });

    changeText();

    $(".product_content").hide();
    $(".sprint_content").hide();
    $(".board_content").hide();

    $(".close_button, .outerclose").click(function(){
        form_close();
    });

    $(".summary_menu").click(function(){
        remove_menu_active();
        $(".summary_menu").addClass("menu_active");
        $(".Title").text("Summary");
        $(".summary_content").show();
        summaryCount();
        $(".filter_dropdown").hide();
    });
    $(".product_menu, .sprint_product_menu").click(function(){
        remove_menu_active();
        $(".product_menu").addClass("menu_active");
        $(".Title").text("Product Backlog");
        $(".product_content").show();
        $(".filter_dropdown").hide();
    });
    $(".sprint_menu").click(function(){
        remove_menu_active();
        $(".sprint_menu").addClass("menu_active");
        $(".Title").text("Sprint Backlog");
        $(".sprint_content").show();
        $(".sprintList").show();
        $(".sprintData").hide();
        $(".filter_dropdown").hide();
    });
    $(".board_menu").click(function(){
        remove_menu_active();
        scrumTask();
        //scrumTodo();
        //scrumInProgress();
        //scrumDone();
        $(".board_menu").addClass("menu_active");
        $(".Title").text("Scrum Board");
        $(".board_content").show();
        $(".filter_dropdown").hide();
    });

    $(".help_menu").click(function(){
        var html="<input type='hidden' class='picNum' name='' value='1'>";
            html+="<div class='container_help'><img class='help_image' src='tutorial_pics/1.JPG' alt=''></div>";
            html+="<Button onclick='prevPic()'>Prev</Button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<Button onclick='nextPic()'>Next</Button>";

        swal.fire({
            title: "How to use Flowplan",
            html: html,//"<center><div>Tutorial and Introduction</div></center><iframe width='720' height='450' src='https://www.youtube.com/embed/93otCyqd7zo'</iframe>",//src='https://www.youtube.com/embed/tgbNymZ7vqY'
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
    });

    $(".setTimerAccu").click(function(){
        var num = $(".setTimerAccu").val();
        $(".sprint_time").val(num);
    });

    $(".isetTimerAccu").click(function(){
        var num = $(".isetTimerAccu").val();        
        $(".sprint_itime").val(num);
    });

    $(".esetTimerAccu").click(function(){
        var num = $(".esetTimerAccu").val();        
        $(".edit_sprint_time").val(num);
    });

    $(".iesetTimerAccu").click(function(){
        var num = $(".iesetTimerAccu").val();        
        $(".iedit_sprint_time").val(num);
    });
        
});


//AJAX COMPLETE
$(document).ajaxComplete(function(){
    $(".sprint_num").mouseover(function(){
        $(this).show(function(){
            $(this).children(".delete_sprint").show();
        });
    });
    $(".sprint_num").mouseout(function(){
        $(this).show(function(){
            $(this).children(".delete_sprint").hide();
        });        
    });

    $(".task_data").mouseover(function(){
        var comment = $(this).children(".comment").html();
        if(comment != ""){
            $(this).css({"margin-bottom": "50px"});
            $(this).children(".comment").show();
            $(this).children(".commentIndicator").css({"background": "rgb(113, 105, 105)"});
        }
    });

    $(".task_data").mouseout(function(){
        var comment = $(this).children(".comment").html();
        if(comment != ""){
            $(this).css({"margin-bottom": "unset"});
            $(this).children(".comment").hide();
        }
    });

    $(".sprint_product_menu").click(function(){
        remove_menu_active();
        $(".product_menu").addClass("menu_active");
        $(".Title").text("Product Backlog");
        $(".product_content").show();
        $(".filter_dropdown").hide();
    });
});


/*function openSprint(){
    $(".sprintList").hide();
    $(".sprintData").show();
}*/

function nextPic(){
    let picNum = $(".picNum").val();
    setNum = parseInt(picNum);
    setNum = setNum + 1;

    if(setNum == 24){setNum = 1}
    $(".picNum").val(setNum);
    
    html = "<img class='help_image' src='tutorial_pics/"+setNum+".JPG' alt=''></img>"
    $('.container_help').html(html);
}

function prevPic(){
    let picNum = $(".picNum").val();
    setNum = parseInt(picNum);
    setNum = setNum - 1;

    if(setNum == 0){setNum = 23}
    $(".picNum").val(setNum);
    
    html = "<img class='help_image' src='tutorial_pics/"+setNum+".JPG' alt=''></img>"
    $('.container_help').html(html);
}

function closeSprint(){
    $(".sprintList").show();
    $(".sprintData").hide();
}

function remove_menu_active(){
    $(".summary_menu").removeClass("menu_active");
    $(".product_menu").removeClass("menu_active");
    $(".sprint_menu").removeClass("menu_active");
    $(".board_menu").removeClass("menu_active");
    $(".sprintList").hide();
    $(".sprintData").hide();
    $(".summary_content").hide();
    $(".product_content").hide();
    $(".sprint_content").hide();
    $(".board_content").hide();
    $(".noValSprint").text("No story is save on this sprint. To add you must set the sprint number of the story in the PRODUCT BACKLOG.");
}

function form_close(){
    $(".doneLinks").val("");
    $(".recommendShort").hide();
    $(".instantEditTaskWindow").hide();
    //$("#defaultStoryStatus")[0].reset();
    $(".window").hide();
    $(".window2").hide();
    $(".done_links").hide();
    $(".instantAddTaskWindow").hide();
    $(".product_window").hide();
    $(".editTaskWindow").hide();
    $(".addTaskWindow").hide(); 
    $(".form_login").hide();
    $(".form_signup").hide();
    $(".viewMembers").hide();
    $(".pickcolor").hide();
    $(".role-selection").hide();
    $(".update_logs").hide();
    $(".created_task").hide();
    $(".finished_task").hide();
    $(".how_to_use").hide();
    $(".window").css("width", "530px");
    $(".window").css("top", "100px");
    $(".window").css("background-color", "#eee");//238
    let picNum = 1;
    $(".picNum").val(picNum);
    html = "<img class='help_image' src='tutorial_pics/1.JPG' alt=''></img>"
    $('.container_help').html(html);
    
    blackFade();
}

function blackFade(){
    $(".black").fadeOut(); 
    $(".black2").fadeOut(); 
}

function run_login(){
    $(".black").fadeIn()
    $(".product_window").show()
    $(".window").show();
}

function run_edit_story(){
    $(".black").fadeIn()
    $(".product_window").show()
    $(".window").show();
}

function run_signup(){
    $(".black").fadeIn()
    $(".form_signup").show()
    $(".window").show();
}

function run_members(){
    listMembers();
    $(".black").fadeIn()
    $(".viewMembers").show()
    $(".window").show();
}

function run_updates(){
    $(".black").fadeIn()
    $(".update_logs").show();
    $(".window").show();
    update_logs();
}

function run_created(){
    $(".black").fadeIn()
    $(".created_task").show();
    $(".window").show();
    createdTask();
}

function run_finished(){
    $(".black").fadeIn()
    $(".finished_task").show();
    $(".window").show();
    finishedTask()
}

//load dashboard
function dashboard(id){
    location.replace("project_loader.php?projId="+id);
}

//accept team
/*function acceptInvite(id, proj, role){
    var color = $(this).data('color');
    location.replace("team_loader.php?teamId="+id+"&projId="+proj+"&roleId="+role+"&color="+color);
}*/

$(document).on("click",".pn",function(){
    var id = $(this).data('teamid');
    var proj = $(this).data('projectid');
    var role = $(this).data('roleid');
    var color = $(this).data('color');

    location.replace("team_loader.php?teamId="+id+"&projId="+proj+"&roleId="+role+"&color="+color);
});

$(document).on("click",".acc_proj",function(){
    var id = $(this).data('teamid');
    var proj = $(this).data('projectid');
    var role = $(this).data('roleid');
    var color = $(this).data('color');

    location.replace("team_loader.php?teamId="+id+"&projId="+proj+"&roleId="+role+"&color="+color);
});

$(document).on("click",".memberrole-color",function(){
    $(this).prev().toggle();
    $(".role-selection").hide();
});

$(document).on("click",".RoleNames",function(){
    $(this).next().toggle();
    $(".pickcolor").hide();
});

function proceed(){
    location.replace("logoutProject.php");
}

function logout(){
    $(document).empty();
    location.replace("logout.php");
}


//kanban
function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function allowDrop(ev) {
    ev.preventDefault();
}

function allowDropA(id, idd, ev){
    //ev.preventDefault();
    alert(id+" and "+idd);
    //ev.defaultPrevented;
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}

function newDrag(){
    alert("ok");
}

$(".task_data").on("ondragover", function(){
    $(this).css("margin-top", "100px");
})

function changeText(){
    if($(".t_prio").text() == "4"){
        $(".t_prio").text("unset");
    }
    
}