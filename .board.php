<div class="board_holder">
    <div class="boardTask" id="task">
        <h4 class="head_board">&nbsp; Task</h4>
        <div class="task_Container Container" ondrop="drop(event)" ondragover="allowDrop(event)">
            
            <p class="task_data" id="task1" draggable="true" ondragstart="drag(event)">Meeting With The Team
                <span class="member1"></span>
                <button class="task_owner">Juan</button>
            </p>
            <p class="task_data" id="task2" draggable="true" ondragstart="drag(event)">Design Mockup
                <span class="member4"></span>
                <button class="task_owner">Mardy</button>
            </p>
            <p class="task_data" id="task3" draggable="true" ondragstart="drag(event)">Template for the website
                <span class="member2"></span>
                <button class="task_owner">Keint</button>
            </p>
            <p class="task_data" id="task4" draggable="true" ondragstart="drag(event)">Backend
                <span class="member3"></span>
                <button class="task_owner">Ace</button>
            </p>
            <p class="task_data" id="task5" draggable="true" ondragstart="drag(event)"> Login Page
                <span class="member3"></span>
                <button class="task_owner">Ace</button>
            </p>
            <p class="task_data" id="task6" draggable="true" ondrop="allowDropA(1, 2, event)" ondragstart="drag(event)">System Documentation
                <span class="member1"></span>
                <button class="task_owner">Juan</button>
            </p>
            <p class="task_data" id="task5" draggable="true" ondragstart="newDrag()"> Login Page
                <span class="member3"></span>
                <button class="task_owner">Ace</button>
            </p>

            <div class="task_data">Login Page
                <div class="TaskStatus">Status</div>
                <div class="changeStatus" style="display:none">
                    <div onclick="changeStatus(1, 4)" class="actionTask">Unset</div>
                    <div onclick="changeStatus(1, 1)" class="actionToDo">To do</div>
                    <div onclick="changeStatus(1, 2)" class="actionProgress">In Progress</div>
                    <div onclick="changeStatus(1, 3)" class="actionDone">Done</div>
                </div>
                <span class="member4"></span>
                
                <div class="task_owner">Ace Pocholo Aguilar</div>
                <div class="changeOwner" style="display:none">
                    <div data-taskId="1" data-member="Ace Aguilar" data-color="Indigo" class="AssignedMember">Ace Aguiar</div>
                    <div class="AssignedMember">Juan Dela Cruz</div>
                    <div class="AssignedMember">Mardy Incenares</div>
                    <div class="AssignedMember">Keint Bajao</div>
                </div>
            </div>
        </div>
    </div>
    <div class="boardToDO">
        <h4 class="head_board">&nbsp; To Do</h4>
        <div class="ToDo_Container Container" ondrop="drop(event)" ondragover="allowDrop(event)">
        </div>
    </div>
    <div class="boardProgress">
        <h4 class="head_board">&nbsp; In Progress</h4>
        <div class="Progress_Container Container" id="inprogress" ondrop="drop(event)" ondragover="allowDrop(event)">
        </div>
    </div>
    <div class="boardDone">
        <h4 class="head_board">&nbsp; Done</h4>
        <div class="Done_Container Container" id="done" ondrop="drop(event)" ondragover="allowDrop(event)">
        </div>
    </div>
</div>