<?php

session_start();

//connect to database
$db=mysqli_connect("localhost","root","","collegedb");

if(isset($_POST['login_btn']))
{
    //$username=mysql_real_escape_string($_POST['username']);
    //$password=mysql_real_escape_string($_POST['password']);
    $username=($_POST['username']);
    $password=($_POST['password']);

    //$password=md5($password); //Hash Password
    $sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result=mysqli_query($db, $sql);
    
    if(mysqli_num_rows($result)==1)
    {
        $_SESSION['message'] = "Login Successful !!";
        $_SESSION['username']=$username;
        header("location:dashboard.php"); //Redirect to homepage
    }
    else
    {
        $_SESSION['message'] = "Check your credentials !!";
    }

}

?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="shortcut icon" href="fav3.png" />
        <title>Login Page</title>
        <meta name="viewport" content="width=device-width" initial-scale=1.0>
        <style>

            *
            {
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .header{
                padding:2px;
                text-align:center;
                background: #1abc9c;
                color: white;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            .header h1{
                font-size: 40px;
            }
            .header p{
                font-size: 20px;
            }

            .container{
                font-family: Cambria, Helvetica, sans-serif;
                font-size:17px;
                padding:20px;
                margin:40px;
                max-width:400px;
                float:center;
                background-color:lightgrey;
                box-shadow: 5px 5px 10px grey;
            }
            .img-container{
                text-align:center;
                margin:24px 0 12px 0;
            }
            img.avatar{
                width:120px;
                border-radius:50%;
            }

            .table tr,td{
                padding:5px;
            }
            .textInput{
                border:none;
                box-shadow: 2px 2px 4px grey;
            }
            .btn{
                color:white;
                background-color:green;
                float: center;
                border:none;
                cursor:pointer;
                margin: 0px 0px;
                margin-top: 4px;
                padding: 10px 24px;
                box-shadow: 0 9px #999;
                box-shadow: 4px 4px 2px grey;
            }
            .btn{border-radius: 4px;}

            .btn:hover{
                background-color: #119615;
            }
            .btn:active{
                background-color: #3e8e41;
                box-shadow: 0 5px #666;
                transform:translateY(4px);
            }
            input[type=text]{
                width:100%;
                padding:8px;
                box-sizing:border-box;
                margin-top:5px;
                margin-bottom:5px;
                resize:vertical;
            }

            input[type=password]{
                width:100%;
                padding:8px;
                box-sizing:border-box;
                margin-top:5px;
                margin-bottom:5px;
                resize:vertical;
            }

            .footer
            {
                padding: 20px;
                text-align: center;
                background: #ddd;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                //position:fixed;
                left:0;
                bottom:0;
                width:100%;
            }

        </style>
    </head>
    <body>

    <div class="header">
            <h1>HOSPITAL RECEPTION SYSTEM</h1>
            <p>A Ranjit Shinde Website</p>
    </div>

    <?php
    
    if(isset($_SESSION['message']))
    {
        echo "<div id='error_msg'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
    
    ?>

        <center>

        <form method="post" action="admin_login.php">
        <div class="container">
        <h1>LOGIN PAGE</h1>
        <div class="img-container">
            <img src="avatar.png" alt="Avatar" class="avatar">
        </div>
        <table>
               <tr>
                   <td>Username</td>
                   <td><input type="text" name="username"  autofocus autocomplete="off" class="textInput"></td>
               </tr>                        
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" class="textInput"></td>
            </tr>                         
            <tr>
                <td></td>
                <td><input type="submit" name="login_btn" value="Login" class="btn"></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <td></td>
            
           </table>
           </div> 
        </form>
        </center>

    </body>
</html>