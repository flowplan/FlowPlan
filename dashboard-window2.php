
<div class="black2" style="display: none;">
    
    <div class="outerclose"></div>
        <div class="window2" style="display: none;">
            <!--how to use window-->
            <div class="how_to_use" style="display: none;">
                <img class="close_button" src="css/close.png" alt="X">
                <input type="hidden" class="picNum" name="" value="1">
                <!--h4 style="color:white;">How to use Flow Plan?</h3-->
                <div class="container_help">
                    <img class="help_image" src="tutorial_pics/1.JPG" alt="">
                </div>
                <Button onclick='prevPic()'>Prev</Button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<Button onclick='nextPic()'>Next</Button>
            </div>


            <!--Done Link Attachment-->
            <div class="done_links" style="display: none;">

                <img class="close_button" src="css/close.png" alt="X">
                <h2>Finished Task Confirmation</h2>
                <p>Add your proof that you have finished the task given to you.</p>
                
                <input type="hidden" class="doneId_status">
                <label for="doneLinks" style="font-weight:bold; font-size:12px;">Attachment Link:</label>
                <input type="text" placeholder="Limit of 100 Characters only" onkeyup="checkMaxLength()" maxlength="100" class="doneLinks" id="doneLinks">
                <p class="recommendShort" style="display:none;font-size:11px;font-weight:bold;margin:1px">Is your url is very long? Try shorten your link here at 
                <a href="https://tinyurl.com/app/" target="_blank" style="color:blue;text-decoration:underline">TinyUrl</a> or <a href="https://www.shorturl.at/" target="_blank" style="color:blue;text-decoration:underline">ShortUrl</a>. </p>
                <br>
                <button class="done_action" onclick="finishStatus()">Submit</button>
                <button class="done_action" onclick="form_close()">Cancel</button>
            </div>
        </div>

</div>