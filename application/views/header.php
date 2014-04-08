<?php $this->load->helper('html');?>
<html>
    <head>
    <link rel="stylesheet" href="jquery-mobile/styles/jquery.mobile-1.3.1.min.css" />
    <style>
        #links 
        {
            background-color: lightgreen;
            width:100%;
            height:5%           
        }
        #links div
        {
            margin: 1%;
            float:left;
        }  
        #welcome-msg {
            float:right !important;
        }
        #Codeigniter {
            position: absolute;
            left:37%;
            top:0%;
            font-size: 30px;
            color:red;
            font-weight: bold;
        }
    </style>
    </head>
    <body> <?php
        $userId = $this->session->userdata('user_id');
        $userName = $this->session->userdata('user_name');
        $homelink = $userId ? '/logins/home': '/'; ?>
        <div data-role="header" id="links">
            <div id="home"><a href="<?=$homelink?>">Home</a></div> <?php
            if ($userId) {   ?>
                <div id="view-all"><a href="/logins/view_all/<?=$userId?>">View All</a></div>
                <div id="SignOut"><a href="/logins/signout">Signout</a></div> 
                <div id="Codeigniter">My First Codeigniter</div> <?php
                if ($userName) { ?>
                    <div id="welcome-msg">
                        Hi
                        <?=nbs(10)?>
                        <b>
                            <font color="red">
                                <?=ucfirst($userName) ?>
                            </font>
                        </b>
                    </div> <?php
                } 
            } else { ?>
                <div id="login"><a href="/logins/signup">Signup</a></div>
                <div id="Codeigniter">My First Codeigniter</div> <?php 
            } ?>
        </div>
    </body>
</html>