<?php
require_once "class/workload-count.php";

    if($workload == ""){
        $workload = "['Unset', 0]";
    }

?>

<div class="summary_holder">
    <div onclick="run_finished()" class="sum_done">
        <h2 class="total_done">Finished</h2>
        <p>Project Task</p>
    </div>
    <div onclick="run_updates()" class="sum_update">
        <h2 class="total_report"> Reports</h2>
        <p>In the last 7days</p>
        <div class='total_new_report'><span class='notif_report'></span></div>
    </div>
    <div onclick="run_created()" class="sum_created">
        <h2 class="total_created"> Created</h2>
        <p>In Task Total</p>
    </div>
    <div onclick="run_members()" class="sum_due">
        <h2 class="total_member"> Members</h2>
        <p>Assigned to this project</p>
        <div class='total_request_report'><span class='request_report'></span></div>
    </div>
    <br>
    <div class="sum_overview">
        <h3>Status Overview</h3>
        <canvas id="statusView"  style="width: 100%; max: width 450px;"></canvas>
    </div>
    <div class="sum_priority">
        <h3>Priority Breakdown</h3>
        <canvas id="priorityView"  style="width: 100%; max: width 450px;"></canvas>
    </div>
    <br>
    <div class="sum_members">
        <h3>List of Members and Workloads</h3>
        <div id="myWorkload"  style="width: 100%; max: width 500px; height: 300px;"></div>
    </div>
</div>



<script>

    function summaryOut(){

    //summary
    var sum_pending = $(".hid_pending").val();
    var sum_todo = $(".hid_todo").val();
    var sum_inprogress = $(".hid_inprogress").val();
    var sum_done = $(".hid_done").val();
    var sum_should = $(".hid_should").val();
    var sum_could = $(".hid_could").val();
    var sum_maybe = $(".hid_maybe").val();
    var sum_unset = $(".hid_unset").val();

    var overview_status = ["Pending", "To Do", "In Progress", "Done"];
    var status_num = [sum_pending, sum_todo, sum_inprogress, sum_done];
    var status_color = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9"
    ];
    //priority
    var priority_status = ["Should", "Could", "Maybe", "Unset"];
    var prio_num = [sum_should, sum_could, sum_maybe, sum_unset];
    var prio_color = ["Orange", "Blue", "Green", "Gray"];

    new Chart("statusView",{
        type: "doughnut",
        data: {
            labels: overview_status,
            datasets: [{
                backgroundColor: status_color,
                data: status_num
            }]
        }
    });

    new Chart("priorityView",{
        type: "bar",
        data: {
            labels: priority_status,
            datasets: [{
                backgroundColor: prio_color,
                data: prio_num
            }]
        },
        options: {
            legend: {display: false},
            title: {
                display: true,
            }
        }
    });


//members
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(mem_workload);


function mem_workload(){
    var data = google.visualization.arrayToDataTable([
        ['Members', 'workload'],
        <?php echo $workload;?>
    ]);


var opt_work = {
    title: "Member's Workloads"
};

var workChart = new google.visualization.BarChart(document.getElementById('myWorkload'));
    workChart.draw(data, opt_work);

}
}
</script>