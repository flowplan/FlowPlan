<script>
    function summaryIndex(){
        $.ajax({
            url:"class/summary-index.php",
            method: "GET",
            dataType: "JSON",

            success:function(e){
               
               $(e).each(function(key, value){
                   $(".userCount").html(value.allUser);
                   $(".finishedCount").html(value.allFinished);
                   $(".projectCounts").html(value.allProjects);
                   $(".StoryCounts").html(value.allProduct);
               })
            }
        })
    }

    //Login
    function normal_login(){
        var user = $("#userlog").val();
        var pass = $("#passlog").val();
        if (user == "" || pass == "") {
            alert("Please fill up the fields");
        }
        else
        {
            $.ajax({
                url: "class/login.php?user="+user+"&pass="+pass,
                type: "GET",
                dataType: "JSON",

                success:function(e){
                    if (e == 1) {
                        location.replace("template.php");
                    }
                    else if(e == "not verified"){
                        alert("This is account is now verfied yet check your email for account verfication");
                    }
                    else if(e == 0){
                        alert("Incorrect Username and Password");
                    }
                }
            })
        }
    }


    //Google Sign up
    function googleSignUp() {
        location.replace("class/google-signing.php");
        /*$.ajax({
            url: "class/google-signing.php",
            type: "GET",
            dataType: "JSON",

            success:function(e){
                location.replace("template.php")
            }
        })*/
    }

    //register
    function register(){
        if ($("#userReg").val()== "" ||
            $("#passReg").val()== "" ||
            $("#emailReg").val()== ""){
            alert("Please fill up the requirements needed");
        }
        else{
            if($("#passReg").val() == $("#cpassReg").val()){

                var regUser = $("#userReg").val();
                var regPass = $("#passReg").val();
                var regEmail = $("#emailReg").val();

                $.ajax({
                    url:"class/register.php?username="+regUser+"&password="+regPass+"&email="+regEmail,
                    type:"GET",
                    dataType:"JSON",

                    success:function(e){
                        if(e == "taken"){
                            alert("this username is already taken.");
                        }
                        else if(e == "invalid email")
                        {
                            alert("Improper format of email address");
                        }
                        else if(e == "emailTaken")
                        {
                            alert("The Email Address is already used");
                        }
                        else{
                            alert("Registration is a success! You can now verify your account using the email you use "+regEmail+".");
                            $("#userReg").val("");
                            $("#passReg").val("");
                            $("#cpassReg").val("");
                            $("#emailReg").val("");
                        }
                    }
                })

            }
            else
            {
                alert("Password and confirmed password doesn't match");
            }
        }        
    }

    $(document).ready(function(){
        summaryIndex();
    });
</script>