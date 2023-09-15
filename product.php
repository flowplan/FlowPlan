<div class="product_filters">
        <span class="product_filter_fields">Sprints</span>
        <select onchange="showProjectStories()" id="filterSprints" class="filterSprints product_filter_select">
            <option value="All">All</option>
            <!--option value="0">Unset</option>
            <option value="">1</option>
            <option value="">2</option>
            <option value="">3</option>
            <option value="">4</option>
            <option value="">5</option-->
        </select>
        &nbsp;
        <span class="product_filter_fields">Priorities</span>
        <select onchange="showProjectStories()" id="filterPriorities" class="filterPriorities product_filter_select">
            <option value="All">All</option>
            <option value="4">Unset</option>
            <option value="1">Should</option>
            <option value="2">Could</option>
            <option value="3">Maybe</option>
        </select>
        &nbsp;
        <span class="filterStatus product_filter_fields">Status</span>
        <select onchange="showProjectStories()" id="filterStatus" class="filterStatus product_filter_select">
            <option value="All">All</option>
            <option value="4">Unset</option>
            <option value="1">Todo</option>
            <option value="2">In Progress</option>
            <option value="3">Done</option>
        </select>
        &nbsp;
    </div>

    <input type="text" name="" id="myStory" maxlength="100" placeholder="I want to able to...">
    <input type="text" name="" id="myObjective" maxlength="100" placeholder="So that I can...">

    <button class="create_btn" onclick="createMyStories()">Create Story</button>

<div class="product_holder">
    
    <table class="product_table">
        <thead>
        <tr class="product_tblHeader">
            <th class="h_sprint">Sprint</th>
            <th class="h_entity">As a...</th>
            <th class="h_story">I want to able to...</th>
            <th class="h_obj">So that I can...</th>
            <th class="h_prio">Priority</th>
            <th class="h_status">Status</th>
        </tr>
        <tr class="mob_rws">
            <th><br></th>
        </tr>
        <tr class="mob_rws">
            <th><br></th>
        </tr>
        
        </thead>
        <tbody class="gentblStory">
        <!--data here-->
        </tbody>
        <!--tbody>
        <tr class="product_tblData2">
            <td class="create_story" colspan="4">
                <input type="text" name="" id="myStory" maxlength="100" placeholder="I want to able to...">
                <input type="text" name="" id="myObjective" maxlength="100" placeholder="So that I can...">
            </td>
            <td class="create_btn">
                <button onclick="createMyStories()">Create Story</button>
            </td>
        </tr>
        </tbody-->
    </table>

    <script></script>
</div>