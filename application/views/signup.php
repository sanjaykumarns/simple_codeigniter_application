<?php $this->load->helper('form'); ?>
<html>
    <head>
        <title> <?php echo $title; ?> </title>
        <style type="text/css">
            #signup 
            {
                margin: 10% 15% 30% 38%;
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
                margin-left: 15%;
            }
            h2 {
                margin-left:17%;
            }
            p {
                color:red;
            }
        </style>
    </head>
    <body>
        <div id="signup">

                <h2>Signup.</h2> <?php 
                echo validation_errors(); 
                $formAttributes = array('name' => 'f1');
                echo form_open('/logins/insert_user', $formAttributes); // or <form name="f1" action="/logins/insert_user" method="post" >
                $unameArr = array(
                              'name'        => 'uname',
                              'id'          => 'uname',
                              'size'        => '10',
                              'value'       => set_value('uname')
                            );
                $passArr = array(
                              'name'        => 'pass',
                              'id'          => 'pass',
                              'size'        => '10',
                              'value'       => set_value('pass')
                            );
                $submitArr = array(
                              'name'        => 'submit',
                              'id'          => 'submit',
                              'value'       => 'Register'
                            );
                echo "Username".form_input($unameArr); 
                echo "<br />";
                echo "Password ".form_password($passArr); 
                echo "<br />";
                echo form_submit($submitArr); // or <input type="submit" id="submit" value="Register" /> ?>
            </form>
        </div>
    </body>
</html>