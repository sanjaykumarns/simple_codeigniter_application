<html>
    <head>
        <title> All Users </title>
        <style type="text/css">
            #listusers 
            {
                margin: 1% 30% 30% 40%;
            }
        </style>
    </head>
    <body>
        <div id="listusers">
            <h4>Registered Users</h4>
            <table border="1" bgcolor="lightgreen" style="">
                <tr>
                    <td>ID</td>
                    <td>Username</td>
                    <td>Password</td>
                </tr><?php
                foreach ($json_users AS $row)
                { 
                    $style = ($logged_in_user_id == $row['id']) ? "style='color:red';" : ''; ?>
                    <tr <?=$style?>>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                    </tr> <?php 
                } ?>
            </table>
        </div>
    </body>
</html>