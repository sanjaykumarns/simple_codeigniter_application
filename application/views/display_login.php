<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <title> <?php echo $title; ?> </title>
        <style type="text/css">
            #login 
            {
                margin: 10% 30% 30% 40%;
            }
            #uname
            {
                margin: 0 20 0 20;
            }
            #pass 
            {
                margin: 0 20 0 20;
            }
            #submit
            {
                margin-left: 20%;
            }
            h2{
                margin-left:15%;
            }
        </style>
        <script type="application/javascript">
            $(document).ready(function() {
                $('#submit').click(function() {
                    var username = $('#uname').val();
                    var password = $('#pass').val();
                    if (!(username && password)) {
                        if (!username) {
                            $('#unameErr').html('Enter username');
                        } else {
                            $('#unameErr').html('');
                        }
                        if (!password) {
                            $('#passwordErr').html('Enter password');
                        } else {
                            $('#passwordErr').html('');
                        }
                        $('#message').html('');
                        return false;
                    } else {
                        var form_data = {
                            username : username,
                            password : password
                        };
                        $.ajax({
                            url     : '/logins/ajax_check_login',
                            type    : 'POST',
                            async   : false,
                            data    : form_data,
                            success : function(status) {
                                if (status == -1)
                                    $('#message').html("<font color='red'>Invalid user</font>");
                                else {
                                    window.location.href="/logins/home";
                                }
                            }
                        });
                        $('#unameErr').html('');
                        $('#passwordErr').html('');                        
                        return false;
                    }
                });
                $('#unameErr').css ({'color': 'red'});
                $('#passwordErr').css ('color', 'red');
            });
        </script>
    </head>
    <body>
        <div id="login">
            <form name="f1">
                <h2>Take Me In.</h2>
                Username:<input type="text" name="uname" id="uname" size="10" /><span id="unameErr"></span><br />
                Password: <input type="password" name="pass" id="pass" size ="10" /><span id="passwordErr"></span>
                <div id="message"></div><br />
                <input type="submit" id ="submit" value="Login" />
            </form>
        </div>
    </body>
</html>