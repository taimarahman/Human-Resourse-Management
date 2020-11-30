
<?php include 'login-logic.php';?>
<html>
    
    <head>
        <title>Login to HRM-App</title>
    </head>
    <style type="text/css">
            body{
                color: azure;
                margin-top: 200px;
                 background-image: url(css/img/d.jpg);
                background-size: cover;
                background-attachment: fixed;
            }
            .content{
                background: white;
                width: 50%;
                padding: 40px;
                margin: 100px auto;
            }
        </style>
    <body>
        <form name="frmUser" method="post" action="login-logic.php" align="center">
             <div class="message">
                <?php 
                    if ($message != "") {
                        echo $message;
                    } 
                ?>
            </div>
            <h2 align="center">Enter Login Details</h2>
            Username:<br>
            <input type="text" name="username" value="">
            <br><br/>
            Password:<br>
            <input type="password" name="password" value="">
            <br><br><br/>
            
            <input type="submit" name="submit" value="SignIn">
            <input type="reset">
        </form>
    </body>
</html>