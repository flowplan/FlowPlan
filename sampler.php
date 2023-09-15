<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="kanban1.css">
    <title>Kanban Board</title>
    <script>
        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="kanban-heading">
            <strong class="kanban-heading-text">Kanban Board</strong>
        </div>
        <div class="kanban-board">
            <div class="kanban-block" id="todo" ondrop="drop(event)" ondragover="allowDrop(event)">
                <strong>To Do</strong>
                <div class="task-button-block">
                    <button id="task-button">Create new task</span>
                </div>
                <div class="task" id="task1" draggable="true" ondragstart="drag(event)">
                    <span>Task 1</span>
                </div>
                <div class="task" id="task2" draggable="true" ondragstart="drag(event)">
                    <span>Task 2</span>
                </div>
                <div class="task" id="task3" draggable="true" ondragstart="drag(event)">
                    <span>Task 3</span>
                </div>
                <div class="task" id="task4" draggable="true" ondragstart="drag(event)">
                    <span>Task 4</span>
                </div>
                <div class="task" id="task5" draggable="true" ondragstart="drag(event)">
                    <span>Task 5</span>
                </div>
                <div class="task" id="task6" draggable="true" ondragstart="drag(event)">
                    <span>Task 6</span>
                </div>
            </div>
            <div class="kanban-block" id="inprogress" ondrop="drop(event)" ondragover="allowDrop(event)">
                <strong>In Progress</strong>
            </div>
            <div class="kanban-block" id="done" ondrop="drop(event)" ondragover="allowDrop(event)">
                <strong>Done</strong>
            </div>
        </div>
    </div>
</body>
</html>