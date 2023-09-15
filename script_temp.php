<script>
      function renameOk(){
        var projectName = $(".renameInput").val();
        var projectId = $(".renameHidden").val();
        if(projectName != ""){
          $.ajax({
            url:"class/edit-project.php?projId="+projectId+"&projectName="+projectName,
            method: "GET",
            dataType: "JSON",

            success:function(e){
              if(e == "taken"){swal.fire("Project Name already exist.")}
              else{myProjects();}
            }
          })
        }
        else
        {
          swal.fire("Text field is required");
        }
      }

      function abortProject(id){
        //var daata = $(this).data('project');
        //alert(daata);
        let warn = "Are you sure do you want to delete this project? it will remove everything you save inside.";
        swal.fire({
          title: 'Confirmation',
          text: warn,
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete the project!'
        }).then((result)=>{
          if(result.isConfirmed){
            $.ajax({
                url:"class/delete-project.php?projId="+id,
                method: "GET",
                dataType: "JSON",

                success:function(e){
                  myProjects();
                }
            })
            swal.fire("Project Deleted.");
          }
        })
        
      }

      //leave project
      function leaveProject(id){
        let warn = "Are you sure do you want to leave on this project?";
        swal.fire({
          title: 'Confirmation',
          text: warn,
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, I am leaving!'
        }).then((result)=>{
          if(result.isConfirmed){
            $.ajax({
                url:"class/delete-member.php?teamId="+id,
                method: "GET",
                dataType: "JSON",

                success:function(e){
                  myTeamProjectList();
                }
            })
            swal.fire("You left the group project");
          }
        })
      }

      //deccline Project
      function declineProject(id){
        $.ajax({
          url: "class/decline-project.php?teamId="+id,
          method: "GET",
          dataType: "JSON",

          success:function(e){
            myTeamProjectList();
          }

        })
      }

      //deccline Project
      function declineProject(id){
        $.ajax({
          url: "class/decline-project.php?teamId="+id,
          method: "GET",
          dataType: "JSON",

          success:function(e){
            myTeamProjectList();
          }

        })
      }

      //display team invitation
      function myTeamProjectList(){
        var mode = "<?php echo $profile_mode;?>";
        var hidId = $(".hidden_id").val();
        var email = "<?php echo $profile_email;?>";

        $.ajax({
          url: "class/team-projectlist.php?mode="+mode+"&hidden="+hidId+"&email="+email,
          method: "GET",
          dataType: "JSON",

          success:function(e){
            var html ="";
            var counter = 0;

          if(e != ""){

            $(e).each(function(key, value){
              counter++;
              project = value.project;
              project = project.replace(/</g, "&lt;").replace(/>/g, "&gt;");

              if(value.roleId != 1){

                html+="<div class='proj_name'>";
                html+="<p class='pn' data-color='"+value.color+"' data-teamid='"+value.teamId+"' data-projectId='"+value.projectId+"' data-roleId='"+value.roleId+"'><strong>"+project+"</strong></p>";

                if(value.inviteValue == 1)
                {
                  if(value.request_Indicator == 1){var requested = "Requested";}
                  else{var requested = "Leave";}
                  html+="<span data-id='"+value.teamId+"' data-project='"+project+"' class='del_proj_team'>"+requested+"</span></div>";
                }
                else
                {
                  html+="<span class='acc_proj' data-color='"+value.color+"' data-teamid='"+value.teamId+"' data-projectId='"+value.projectId+"' data-roleId='"+value.roleId+"'>Accept</span><span onclick='declineProject("+value.teamId+")' class='del_proj'>Decline</span>";
                }

              $("div.showDataTeam").html(html);
            }
            else{$("div.showDataTeam").html(html);}
            });
          }
          }
        })

      }
      
      //display myproject
      function myProjects(){
        var mode = "<?php echo $profile_mode;?>";
        var hidId = $(".hidden_id").val();

        $.ajax({
          url: "class/project-list.php?mode="+mode+"&hidden="+hidId,
          method: "GET",
          dataType: "JSON",

          success:function(e){
            var html ="";
            var counter = 0;
            var rename = "";
                rename+="<div class='proj_name proj_main'>";
                rename+="<div class='renameProject' style='display:none;'>";
                rename+="<input class='renameInput' maxlength='30' type='text' value=''>";
                rename+="<input class='renameHidden' type='hidden' value=''>";
                rename+="<div onclick='renameOk()' class='renameBtn'>Edit</div>";
                rename+="<div onclick='renameCancel()' class='renameCancel'>Cancel</div>";
                rename+="</div></div>";

          if(e != ""){
            $(e).each(function(key, value){
              counter++;
                project = value.project;
                project = project.replace(/</g, "&lt;").replace(/>/g, "&gt;");

                html+="<div class='proj_name'>";
                html+="<p class='pn1' onclick='dashboard("+value.projectId+")'><strong>"+counter+". "+project+"</strong></p>";
                //html+="<span onclick='abortProject("+value.projectId+")' data-project='"+project+"' data-id='"+value.projectId+"' class='del_proj'>Delete</span>";
                html+="<span data-project='"+project+"' data-id='"+value.projectId+"' class='del_proj'>Delete</span>";
                html+="<span data-id='"+value.projectId+"' data-project='"+value.project+"' class='rename_proj'>Rename</span></div>";

              $("div.showData").html(rename+html);
            });
          }
          else{$("div.showData").html(rename+html);}
          }
        })
      }

      //Create Blank project
      function blackproj(temp){
        var mode = "<?php echo $profile_mode;?>";
        var project = $(".template_project_name").val();
        var hidId = $(".hidden_id").val();

        if (project == ""){
          swal.fire("Project name is required");
        }
        else
        {

          $.ajax({
            url: "class/create-template.php?temp="+temp+"&mode="+mode+"&project="+project+"&hidden="+hidId,
            type: "GET",
            dataType: "JSON",

            success:function(e){
              if(e == "taken"){
                swal.fire("Project name "+ project +" is already taken.");
              }
              else
              {
                swal.fire("Congratulation for creating your project.");
                $(".template_project_name").val("");
                myProjects();
                myTeamProjectList();
              }
            }
          })

        }

        /*if ("<?php echo $profile_mode;?>" == "basic") {
            location.replace("class/create-template.php?temp="+temp+"&mode=basic");
        }
        else if("<?php echo $profile_mode;?>" == "google"){
            location.replace("class/create-template.php?temp="+temp+"&mode=google");
        }*/
    }

    //Profile
    function loadProfile(){

      var myProfile = "<?php echo $profile_name;?>";
      var mode = "<?php echo $profile_mode;?>";

      $.ajax({
        url:"class/profile.php?name="+myProfile+"&mode="+mode,
        type: "GET",
        dataType: "JSON",

        success:function(e){
          $(e).each(function(key, value){            
            if(mode == "basic"){
              $(".hidden_user").val(value.username);
              $(".hidden_id").val(value.userId);
            }
            if(mode == "google")
            {
              $(".hidden_user").val(value.name);
              $(".hidden_id").val(value.googleId);
              $(".hidden_new").val(value.IsNew);
              //myProjects();
            }
          
          })
        }
      })
    }

    //Loader
    $(document).ready(function() {
      loadProfile();
     
        $(".logo_img").delay(2000).show(function(){
            myProjects();
            myTeamProjectList();
        });
    });

    setInterval(function(){
      //myTeamProjectList();
    }, 10000);
</script>