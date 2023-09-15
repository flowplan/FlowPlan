<div class="black" style="display: none;">
    
    <div class="outerclose"></div>
    <div class="window" style="display: none;">

            <!--story window-->
            <div class="product_window" style="display: none;">
                <p class="opt">Update Story Information</p>
                <input type="hidden" class="edit-productId" name="">
                <img class="close_button" src="css/close.png" alt="X">
                <span>As a: </span> &nbsp;<input id="asA" list="browsers" type="text" maxlength="30" class="inputs asA">
                <datalist id="browsers">
                    <option value="User">
                    <option value="Client">
                    <option value="Owner">
                    <option value="Manager">
                    <option value="Admin">
                </datalist>
                <br>
                <div>I want to able to...</div>
                <textarea id="iWantTo" class="inputs iWantTo" maxlength="100"></textarea><br>
                <div>So that I can...</div>
                <textarea id="soThat" class="inputs soThat" maxlength="100"></textarea><br>
                <form action="" name="default" id="defaultStoryStatus">
                <span>Sprints:</span>
                <select class="sprint_change select_form">
                    <option value="">--------</option>
                    <option value="0">Unset</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>&nbsp;

                <!-- REMOVED
                    <span>Status:</span>
                <select class="status_change select_form">
                    <option value="">-----------</option>
                    <option value="1">To do</option>
                    <option value="2">In Progress</option>
                    <option value="3">Done</option>
                    option value="4">Unset</option
                </select>&nbsp;-->

                <span>Priority:</span>
                <select class="priority_change select_form">
                    <option value="">--------</option>
                    <option value="1">Should</option>
                    <option value="2">Could</option>
                    <option value="3">Maybe</option>
                    <!--option value="4">Unset</option-->
                </select><br><br>
                </form>

                <button class="btn-save-story" onclick="saveStory()">Save</button>&nbsp;
                <button class="btn-save-story" onclick="abortStory()">Abort</button>
            </div>

            <!--add task window-->
            <div class="addTaskWindow" style="display: none;">
                <input type="hidden" class="addtask-productId" name="">
                <input type="hidden" class="addtask-projectId" name="">

                <img class="close_button" src="css/close.png" alt="X">

                <h3>Create new task</h3>
                <form action="" name="default" id="setTimerAccu">
                <p class="field_sprint">Task:</p><textarea type="text" class="sprint_task" maxlength="100" placeholder="Story's Task"></textarea><br>
                <p class="field_sprint">Definition of Done:</p><textarea type="text" class="sprint_define" maxlength="100" placeholder="Definition of Done"></textarea><br>
                <p class="field_sprint">Accumulated of Time per Hour:</p><input style="font-size: 22px;height: 30px; width: 65px;" type="hidden" min="1" max="100" maxlength="3" class="sprint_time" placeholder="0" value="1">
                <select class="setTimerAccu">
                    <option value="">Hours</option>
                    <option value="1">1 Hour</option>
                    <option value="2">2 Hours</option>
                    <option value="3">3 Hours</option>
                    <option value="5">5 Hours</option>
                    <option value="10">10 Hours</option>
                    <option value="24">24 Hours</option>
                    <option value="48">48 Hours</option>
                    <option value="64">64 Hours</option>
                    <option value="100">100 Hours</option>
                </select>
                <br><br>
                </form>
                <button class="sprint_btn_add" onclick="addTask()">Add New Task</button>
                
            </div>

            <!--instant add task window-->
            <div class="instantAddTaskWindow" style="display: none;">

                <img class="close_button" src="css/close.png" alt="X">

                <h3>Create new task</h3>
                <form action="" name="default" id="isetTimerAccu">
                <p class="field_sprint">Task:</p><textarea type="text" class="sprint_itask" maxlength="100" placeholder="Story's Task"></textarea><br>
                <p class="field_sprint">Definition of Done:</p><textarea type="text" class="sprint_idefine" maxlength="100" placeholder="Definition of Done"></textarea><br>
                <p class="field_sprint">Accumulated of Time per Hour:</p><input style="font-size: 22px;" type="hidden" min="1" max="100" maxlength="3" class="sprint_itime" placeholder="Accumulated Time">
                <select class="isetTimerAccu">
                    <option value="">Hours</option>
                    <option value="1">1 Hour</option>
                    <option value="2">2 Hours</option>
                    <option value="3">3 Hours</option>
                    <option value="5">5 Hours</option>
                    <option value="10">10 Hours</option>
                    <option value="24">24 Hours</option>
                    <option value="48">48 Hours</option>
                    <option value="64">64 Hours</option>
                    <option value="100">100 Hours</option>
                </select>
                <br><br>
                </form>
                <button class="sprint_btn_add" onclick="instantaddTask()">Add New Task</button>
            </div>


            <!--edit/delete task window-->
            <div class="editTaskWindow" style="display: none;">
                <input type="hidden" class="editTask-productId" name="">
                <input type="hidden" class="editTask-projectId" name="">
                <input type="hidden" class="editTask-taskId" name="">

                <img class="close_button" src="css/close.png" alt="X">

                <h3>Task Information</h3>
                <form action="" name="default" id="esetTimerAccu">
                <p class="field_sprint">Task:</p> <textarea type="text" class="edit_sprint_task" maxlength="100" placeholder="Story's Task"></textarea><br>
                <p class="field_sprint">Definition of Done:</p> <textarea type="text" class="edit_sprint_define" maxlength="100" placeholder="Definition of Done"></textarea><br>
                <p class="field_sprint">Accumulated of Time per Hour:</p> <input style="font-size: 22px;" type="hidden" min="1" max="100" maxlength="3" class="edit_sprint_time" placeholder="Accumulated Time">
                <select class="esetTimerAccu">
                    <option value="">Hours</option>
                    <option value="1">1 Hour</option>
                    <option value="2">2 Hours</option>
                    <option value="3">3 Hours</option>
                    <option value="5">5 Hours</option>
                    <option value="10">10 Hours</option>
                    <option value="24">24 Hours</option>
                    <option value="48">48 Hours</option>
                    <option value="64">64 Hours</option>
                    <option value="100">100 Hours</option>
                </select>
                <br><br>
                </form>
                <button class="sprint_btn_add" onclick="editTask()">Save</button>
                &nbsp;&nbsp;
                <button class="sprint_btn_add" onclick="deleteTask()">Delete Task</button>
            </div>

            <!--instant edit/delete task window-->
            <div class="instantEditTaskWindow" style="display: none;">
                <input type="hidden" class="ieditTask-productId" name="">
                <input type="hidden" class="ieditTask-projectId" name="">
                <input type="hidden" class="ieditTask-taskId" name="">

                <img class="close_button" src="css/close.png" alt="X">

                <h3>Task Information</h3>
                <form action="" name="default" id="iesetTimerAccu">
                <p class="field_sprint">Task:</p> <textarea style="color: blue;" type="text" class="iedit_sprint_task" maxlength="100" placeholder="Story's Task"></textarea><br>
                <p class="field_sprint">Definition of Done:</p> <textarea style="color: blue;" type="text" class="iedit_sprint_define" maxlength="100" placeholder="Definition of Done"></textarea><br>
                <p class="field_sprint">Accumulated of Time per Hour:</p>
                <input style="color: blue;font-size: 22px;" type="hidden" min="1" max="100" maxlength="3" class="iedit_sprint_time" placeholder="Accumulated Time">
                <select class="iesetTimerAccu">
                    <option value="">Hours</option>
                    <option value="1">1 Hour</option>
                    <option value="2">2 Hours</option>
                    <option value="3">3 Hours</option>
                    <option value="5">5 Hours</option>
                    <option value="10">10 Hours</option>
                    <option value="24">24 Hours</option>
                    <option value="48">48 Hours</option>
                    <option value="64">64 Hours</option>
                    <option value="100">100 Hours</option>
                </select>
                <p class="field_sprint" style="color: darkred;">Add Comment:</p> <textarea type="text" min="1" max="100" maxlength="100" class="iadd_comment" placeholder="Comment"></textarea>
                <br><br>
                </form>
                <button class="sprint_btn_add" onclick="ieditTask()">Save</button>
                &nbsp;&nbsp;
                <button class="sprint_btn_add" onclick="ideleteTask()">Delete Task</button>
            </div>

            <!--view members window-->
            <div class="viewMembers" style="display: none;">
                <img class="close_button" src="css/close.png" alt="X">

                <h4>View Members</h4>
                <div></div>
                <p class="fieldname">Members Email: &nbsp; 
                    <input class="searchMem" type="text" maxlength="50" placeholder="example@mail.com">
                    <button onclick="invite()" class="inviteMem">Send Request</button>
                </p>
                <div class="listMembers">
                    <!--<div class="Member">
                        <div class="MemberImage"><img class="member_pic" src="<?php echo $profile_image;?>" alt="Member"></div>
                        <div class="MemberName">Juan Dela cruz</div>
                        <div class="MemberRole">
                            <span class="MemberColor"><div class="memberrole-color"></div>Developer</span>&nbsp;&nbsp;<button class="MemberAction">Update</button>&nbsp;<button class="MemberAction">Remove</button>
                        </div>
                    </div>-->
                </div>
            </div>

            <!--view project updates window-->
            <div class="update_logs" style="display: none;">
                <img class="close_button" src="css/close.png" alt="X">
                <h3>Project Updates</h3>

                <!--div class="update_logs_container1">
                    <div class="update_logs_data">
                        <table class="td_report">
                            <tr>
                                <td class="td_Ruser">
                                    <div class="report_user">
                                        <div class="report_userPic">
                                            <img width="40" height="40" src="https://lh3.googleusercontent.com/a-/ACNPEu98x6l1IOJqoF6up5KrdpmwQEoz30qU8wEu97aQUw=s96-c" alt="pic">
                                        </div>
                                    </div>
                                </td>
                                <td class="td_Rdetails">
                                    <div class="report_details">
                                        <div class="report_userName"><strong>Task Owner: </strong> Ace Aguilar</div>
                                        <div class="report_task"><strong>Task: </strong>Create a documentation for the survey</div>
                                        <div class="report_story"><strong>Story: </strong>See all the information</div>
                                        <div class="report_comment"><strong>Comment: </strong><input type="text" maxlength="30" style="font-size: 14px;"></div>
                                    </div>
                                </td>
                                <td class="td_Raction">
                                <div class="report_action">
                                    <button class="update_confirm">Accept</button><br>
                                    <button class="update_confirm">Decline</button>
                                </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="update_logs_data">
                        <table class="td_report">
                            <tr>
                                <td class="td_Ruser">
                                    <div class="report_user">
                                        <div class="report_userPic">
                                            <img width="40" height="40" src="https://lh3.googleusercontent.com/a-/ACNPEu98x6l1IOJqoF6up5KrdpmwQEoz30qU8wEu97aQUw=s96-c" alt="pic">
                                        </div>
                                    </div>
                                </td>
                                <td class="td_Rdetails">
                                    <div class="report_details">
                                        <div class="report_userName"><strong>Task Owner: </strong> Ace Aguilar</div>
                                        <div class="report_task"><strong>Task: </strong>Create a documentation for the survey</div>
                                        <div class="report_story"><strong>Story: </strong>See all the information</div>
                                    </div>
                                </td>
                                <td class="td_Raction">
                                <div class="report_action">
                                    <button class="update_confirm">Accept</button><br>
                                    <button class="update_confirm">Decline</button>
                                </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div-->

                
                
                <div class="update_logs_container">
                    <!--div class="update_logs_data"><strong>Juan Dela Cruz</strong>&nbsp;Move this task&nbsp;<strong>login page Mockup</strong>&nbsp;to&nbsp;<strong>Done</strong>&nbsp;from the <strong>story</strong> login website.&nbsp;<button class="update_confirm">Accept</button>&nbsp;<button class="update_confirm">Decline</button></div>
                    <div class="update_logs_data"><strong>Juan Dela Cruz</strong>&nbsp;Move this task&nbsp;<strong>login page Mockup</strong>&nbsp;to&nbsp;<strong>Done</strong>&nbsp;from the <strong>story</strong> login website.&nbsp;<button class="update_confirm">Accept</button>&nbsp;<button class="update_confirm">Decline</button></div>
                    <div class="update_logs_data"><strong>Juan Dela Cruz</strong>&nbsp;Move this task&nbsp;<strong>login page Mockup</strong>&nbsp;to&nbsp;<strong>Done</strong>&nbsp;from the <strong>story</strong> login website.&nbsp;<button class="update_confirm">Accept</button>&nbsp;<button class="update_confirm">Decline</button></div>
                    <div class="update_logs_data"><strong>Juan Dela Cruz</strong>&nbsp;Move this task&nbsp;<strong>login page Mockup</strong>&nbsp;to&nbsp;<strong>Done</strong>&nbsp;from the <strong>story</strong> login website.&nbsp;<button class="update_confirm" onclick='acceptLog()'>Accept</button>&nbsp;<button onclick='declineLog()' class="update_confirm">Decline</button></div>
                    <div class="update_logs_data"><strong>Juan Dela Cruz</strong>&nbsp;Move this task&nbsp;<strong>login page Mockup</strong>&nbsp;to&nbsp;<strong>Done</strong>&nbsp;from the <strong>story</strong> login website.</div>
                    <div class="update_logs_data"><strong>Juan Dela Cruz</strong>&nbsp;Move this task&nbsp;<strong>login page Mockup</strong>&nbsp;to&nbsp;<strong>Done</strong>&nbsp;from the <strong>story</strong> login website.</div>
                    <div class="update_logs_data"><strong>Juan Dela Cruz</strong>&nbsp;Move this task&nbsp;<strong>login page Mockup</strong>&nbsp;to&nbsp;<strong>Done</strong>&nbsp;from the <strong>story</strong> login website.</div>
                    <div class="update_logs_data"><strong>Juan Dela Cruz</strong>&nbsp;Move this task&nbsp;<strong>login page Mockup</strong>&nbsp;to&nbsp;<strong>Done</strong>&nbsp;from the <strong>story</strong> login website.</div>
                    <div class="update_logs_data"><strong>Juan Dela Cruz</strong>&nbsp;Move this task&nbsp;<strong>login page Mockup</strong>&nbsp;to&nbsp;<strong>Done</strong>&nbsp;from the <strong>story</strong> login website.</div>
                    <div class="update_logs_data"><strong>Juan Dela Cruz</strong>&nbsp;Move this task&nbsp;<strong>login page Mockup</strong>&nbsp;to&nbsp;<strong>Done</strong>&nbsp;from the <strong>story</strong> login website.</div>
                    <div class="update_logs_data"><strong>Juan Dela Cruz</strong>&nbsp;Move this task&nbsp;<strong>login page Mockup</strong>&nbsp;to&nbsp;<strong>Done</strong>&nbsp;from the <strong>story</strong> login website.</div>
                    <div class="update_logs_data"><strong>Juan Dela Cruz</strong>&nbsp;Move this task&nbsp;<strong>login page Mockup</strong>&nbsp;to&nbsp;<strong>Done</strong>&nbsp;from the <strong>story</strong> login website.</div-->
                </div>
            </div>

             <!--view Finished Task window-->
             <div class="finished_task" style="display: none;">
                <img class="close_button" src="css/close.png" alt="X">
                <h3>Finished Task</h3>
                
                <!--div class="update_logs_container1">
                    <div class="finished_task_data">
                        <strong>Juan Dela Cruz</strong>&nbsp;Finished the task &nbsp;<strong>login page Mockup</strong>
                        &nbsp; at <span style='color:blue'>7/22/18 15:30</span> to the&nbsp;<strong>story</strong> <span style='color:blue'>login website.</span>
                    </div>

                    <div class="update_logs_data">
                        <table class="td_report">
                            <tr>
                                <td class="td_Ruser">
                                    <div class="report_user">
                                        <div class="report_userPic">
                                            <img width="40" height="40" src="https://lh3.googleusercontent.com/a-/ACNPEu98x6l1IOJqoF6up5KrdpmwQEoz30qU8wEu97aQUw=s96-c" alt="pic">
                                        </div>
                                    </div>
                                </td>
                                <td class="td_Rdetails">
                                    <div class="report_details">
                                        <div class="report_userName"><strong>Task Owner: </strong> Ace Aguilar</div>
                                        <div class="report_task"><strong>Task: </strong>Create a documentation for the survey</div>
                                        <div class="report_story"><strong>Accomplished Date: </strong>7/22/18 15:30</div>
                                    </div>
                                </td>
                                <td class="td_Raction">
                                <div class="report_action">
                                    <strong style='color:#333'>5 Hours</strong>
                                </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div-->
                <div class="finished_task_container">
                    <!--div class="finished_task_data"><strong>Juan Dela Cruz</strong>&nbsp;Finished the task &nbsp;<strong>login page Mockup</strong>&nbsp; at <span style='color:blue'>7/22/18 15:30</span> to the&nbsp;<strong>story</strong> <span style='color:blue'>login website.</span></div>
                    <div class="finished_task_data"><strong>Juan Dela Cruz</strong>&nbsp;Finished the task &nbsp;<strong>login page Mockup</strong>&nbsp; at <span style='color:blue'>7/22/18 15:30</span> to the&nbsp;<strong>story</strong> <span style='color:blue'>login website.</span></div>
                    <div class="finished_task_data"><strong>Juan Dela Cruz</strong>&nbsp;Finished the task &nbsp;<strong>login page Mockup</strong>&nbsp; at <span style='color:blue'>7/22/18 15:30</span> to the&nbsp;<strong>story</strong> <span style='color:blue'>login website.</span></div-->
                </div>

            </div>

            <!--view Created Task window-->
            <div class="created_task" style="display: none;">
                <img class="close_button" src="css/close.png" alt="X">
                <h3>Created Task</h3>
                
                <div class="created_taskk_container">
                    <!--<div class="created_task_data"><strong>7/22/18 15:30 -</strong>&nbsp;A task has been create name &nbsp;<strong>login page Mockup</strong>&nbsp; to the&nbsp;<strong>story</strong> <span style='color:blue'>login website.</span></div>
                    <div class="created_task_data"><strong>7/22/18 15:30 -</strong>&nbsp;A task has been create name &nbsp;<strong>login page Mockup</strong>&nbsp; to the&nbsp;<strong>story</strong> <span style='color:blue'>login website.</span></div>
                    <div class="created_task_data"><strong>7/22/18 15:30 -</strong>&nbsp;A task has been create name &nbsp;<strong>login page Mockup</strong>&nbsp; to the&nbsp;<strong>story</strong> <span style='color:blue'>login website.</span></div>-->
                </div>

            </div>
    </div>

</div>

