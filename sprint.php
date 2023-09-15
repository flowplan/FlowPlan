<div class="sprint_holder">

    <div class="sprintList" style="display:block;">

        <!--<div onclick="openSprint()" class="sprint_num">
            <div class="sprint_name">Sprint 1</div>
            <img src='css/close.png' class='delete_sprint' alt='X'>
            <div class="sprint_week">4 weeks</div>
        </div>

        <div onclick="openSprint()" class="sprint_num">
            <div class="sprint_name">Sprint 2</div>
            <div class="sprint_week">3 weeks</div>
        </div>

        <div onclick="openSprint()" class="sprint_num">
            <div class="sprint_name">Sprint 3</div>
            <div class="sprint_week">3 weeks</div>
        </div>

        <div onclick="openSprint()" class="sprint_num">
            <div class="sprint_name">Sprint 4</div>
            <div class="sprint_week">5 weeks</div>
        </div>
        <div onclick="addSprint()" class="sprint_num">
            <div class="sprint_name Sprint_plus">+</div>
            <div class="sprint_week">Add New Sprint</div>
        </div>-->

    </div>

    
    <div class="sprintData" style="display:none;">
        <div class="btnbackSprint">
            <button onclick="closeSprint()" class="backSprint">Back To Sprints</button>
            <input type='number' min='1' max='100' maxlength='3'>&nbsp;<Strong class='adjustDW' onclick='adjustDW()'>Weeks</Strong>
            &nbsp;<Strong>Time left</Strong>
            &nbsp;<span>Days: </span>
            &nbsp;<span>Hours:</span>
            &nbsp;<span>Seconds:</span>
        </div>
        <!--<table>
            <thead>
                <tr>
                    <th class="H_sprint_story">Use Story</th>
                    <th class="H_sprint_task">Task</th>
                    <th class="H_sprint_done">Definition of Done</th>
                    <th class="H_sprint_time">Acummulated Time</th>
                </tr>
            </thead>
            <tbody>

              
               <tr>
                    <td rowspan="3" class="T_sprint_story">As a Admin I want to able to login to the System so that I can Access to the company Assets</td>
                    <td class="T_sprint_task">Mockup</td>
                    <td class="T_sprint_done">Finish Mockup<div class="Sprint_role1"></div></td>
                    <td class="T_sprint_time">8 Hours</td>
                </tr>
                <tr>
                    <td class="T_sprint_task">Create Backend for the Website</td>
                    <td class="T_sprint_done">Functional System<div class="Sprint_role1"></div></td>
                    <td class="T_sprint_time">24 Hours</td>
                </tr>
                <tr>
                    <td class="T_sprint_task">Create a Database</td>
                    <td class="T_sprint_done">Finished SQL Database Management<div class="Sprint_role3"></div></td>
                    <td class="T_sprint_time">8 Hours</td>
                </tr>

              
                 <tr>
                    <td rowspan="3" class="T_sprint_story">As a Admin I want to able to login to the System so that I can Access to the company Assets</td>
                    <td class="T_sprint_task">Mockup</td>
                    <td class="T_sprint_done">Finish Mockup<div class="Sprint_role2"></div></td>
                    <td class="T_sprint_time">8 Hours</td>
                </tr>
                <tr>
                    <td class="T_sprint_task">Create Backend for the Website</td>
                    <td class="T_sprint_done">Functional System<div class="Sprint_role3"></div></td>
                    <td class="T_sprint_time">24 Hours</td>
                </tr>
                <tr>
                    <td class="T_sprint_task">Create a Database</td>
                    <td class="T_sprint_done">Finished SQL Database Management<div class="Sprint_role4"></div></td>
                    <td class="T_sprint_time">8 Hours</td>
                </tr>
              
                <tr>
                    <td rowspan="3" class="T_sprint_story">As a Admin I want to able to login to the System so that I can Access to the company Assets</td>
                    <td class="T_sprint_task">Mockup</td>
                    <td class="T_sprint_done">Finish Mockup<div class="Sprint_role4"></div></td>
                    <td class="T_sprint_time">8 Hours</td>
                </tr>
                <tr>
                    <td class="T_sprint_task">Create Backend for the Website</td>
                    <td class="T_sprint_done">Functional System<div class="Sprint_role1"></div></td>
                    <td class="T_sprint_time">24 Hours</td>
                </tr>
                <tr>
                    <td class="T_sprint_task">Create a Database</td>
                    <td class="T_sprint_done">Finished SQL Database Management<div class="Sprint_role2"></div></td>
                    <td class="T_sprint_time">8 Hours</td>
                </tr>
              
                <tr>
                    <td rowspan="3" class="T_sprint_story">As a Admin I want to able to login to the System so that I can Access to the company Assets</td>
                    <td class="T_sprint_task">Mockup</td>
                    <td class="T_sprint_done">Finish Mockup<div class="Sprint_role1"></div></td>
                    <td class="T_sprint_time">8 Hours</td>
                </tr>
                <tr>
                    <td class="T_sprint_task">Create Backend for the Website</td>
                    <td class="T_sprint_done">Functional System<div class="Sprint_role3"></div></td>
                    <td class="T_sprint_time">24 Hours</td>
                </tr>
                <tr>
                    <td class="T_sprint_task">Create a Database</td>
                    <td class="T_sprint_done">Finished SQL Database Management<div class="Sprint_role3"></div></td>
                    <td class="T_sprint_time">8 Hours</td>
                </tr>
                
                <tr>
                    <td rowspan="3" class="T_sprint_story">As a Admin I want to able to login to the System so that I can Access to the company Assets <br><br><br> <button class="sprint_btn_add">Add New Task</button></td>
                    <td class="T_sprint_task">Mockup</td>
                    <td class="T_sprint_done">Finish Mockup<div class="Sprint_role4"></div></td>
                    <td class="T_sprint_time">8 Hours</td>
                </tr>
                <tr>
                    <td class="T_sprint_task">Create Backend for the Website</td>
                    <td class="T_sprint_done">Functional System<div class="Sprint_role4"></div></td>
                    <td class="T_sprint_time">24 Hours</td>
                </tr>
                <tr>
                    <td class="T_sprint_task">Create a Database</td>
                    <td class="T_sprint_done">Finished SQL Database Management<div class="Sprint_role1"></div></td>
                    <td class="T_sprint_time">8 Hours</td>
                </tr>
                <tr>
                    <td class="T_sprint_task">
                        <input type="text" class="sprint_task" placeholder="Story's Task">
                    </td>
                    <td class="T_sprint_done">
                        <input type="text" class="sprint_define" placeholder="Definition of Done">
                    </td>
                    <td class="T_sprint_time">
                        <input type="text" class="sprint_time" placeholder="Accumulated Time">
                    </td>
                </tr>
            </tbody>
        </table>-->


        <h4 class="noValSprint">No story is save on this sprint. To add you must set the sprint number of the story in the span PRODUCT BACKLOG.</h4>
        <!--new layout
        <div class="useStory"><div class="myStorySprint">As a Client See the design of my website of each pages and the popups windows. So that I can visualize the process of the system I created.</div>
            <div class="storytask" style="display:none;"><p>Story Task</p>
                <table class="storyTable">
                    <thead>
                        <tr>
                        <th class="H_sprint_task">Task</th>
                        <th class="H_sprint_done">Definition of Done</th>
                        <th class="H_sprint_time">Acummulated Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="T_sprint_task">Website Mockup</td>
                            <td class="T_sprint_done">Finished Website Mockup<div class="Sprint_role4"></div></td>
                            <td class="T_sprint_time">8 Hours</td>
                        </tr>
                        <tr>
                            <td class="T_sprint_task">Website Backend</td>
                            <td class="T_sprint_done">Functional Website Mockup<div class="Sprint_role4"></div></td>
                            <td class="T_sprint_time">108 Hours</td>
                        </tr>
                        <tr>
                            <td class="T_sprint_task">Database for the website</td>
                            <td class="T_sprint_done">Storage for the Website<div class="Sprint_role1"></div></td>
                            <td class="T_sprint_time">10 Hours</td>
                        </tr>
                    </tbody>
                </table>
                <div class="task taskAdd">&nbsp;&nbsp;Add New Task</div>
            </div>
        </div>

        <div class="useStory"><div class="myStorySprint">As a Client See the design of my website of each pages and the popups windows. So that I can visualize the process of the system I created.</div>
            <div class="storytask" style="display:none;"><p>Story Task</p>
                <table class="storyTable">
                    <thead>
                        <tr>
                        <th class="H_sprint_task">Task</th>
                        <th class="H_sprint_done">Definition of Done</th>
                        <th class="H_sprint_time">Acummulated Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="T_sprint_task">Website Mockup</td>
                            <td class="T_sprint_done">Finished Website Mockup<div class="Sprint_role4"></div></td>
                            <td class="T_sprint_time">8 Hours</td>
                        </tr>
                        <tr>
                            <td class="T_sprint_task">Website Backend</td>
                            <td class="T_sprint_done">Functional Website Mockup<div class="Sprint_role4"></div></td>
                            <td class="T_sprint_time">108 Hours</td>
                        </tr>
                        <tr>
                            <td class="T_sprint_task">Database for the website</td>
                            <td class="T_sprint_done">Storage for the Website<div class="Sprint_role1"></div></td>
                            <td class="T_sprint_time">10 Hours</td>
                        </tr>
                    </tbody>
                </table>
                <div class="task taskAdd">&nbsp;&nbsp;Add New Task</div>
            </div>
        </div>-->

    </div>


</div>