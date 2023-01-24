<?php
$msg="";

//connect to database
$db=mysqli_connect("localhost","root","","collegedb");

if(isset($_POST['register_btn']))
{

    $username=($_POST['username']);
    $contact=($_POST['contact']);
    $email=($_POST['email']);
    $password=($_POST['password']);
    $password2=($_POST['password2']);

    if($password == $password2)
    {
        $sql="INSERT INTO registration(username,contact,email,password) VALUES('$username','$contact','$email','$password')";
        mysqli_query($db, $sql);
        $_SESSION['message'] = "Registered Successfully !!";
        $_SESSION['username'] = $username;
    }
    else
    {
        //User not created
        //$_SESSION['message'] = "Passwords does not matched";
        $msg="Passwords does not matched";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registration Page</title>
        <meta name="viewport" content="width=device-width" initial-scale=1.0>
        <style>

            .container{
                font-family: Cambria, Helvetica, sans-serif;
                font-size:16px;
                padding:40px;
                margin:20px;
                padding-top:10px;
                width:300px;
                float:center;
                background-color:lightgrey;
                box-shadow: 5px 5px 10px grey;
            }

            .img-container{
                text-align:center;
                margin:24px 0 12px 0;
            }
            img.avatar{
                width:140px;
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
                padding:5px;
                box-sizing:border-box;
                margin-top:5px;
                margin-bottom:5px;
                resize:vertical;
            }

            input[type=password]{
                width:100%;
                padding:5px;
                box-sizing:border-box;
                margin-top:5px;
                margin-bottom:5px;
                resize:vertical;
            }
        </style>
    </head>
    <body>

    <?php
    
    if(isset($_SESSION['message']))
    {
        echo "<div id='error msg'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
    
    ?>

        <center>
        <form method="post" action="registration.php">
        <div class="container">
        <h1>REGISTRATION PAGE</h1>
        
        <div class="img-container">
            <img src="avatar.png" alt="Avatar" class="avatar">
        </div>
        <table>
               <tr>
                   <td>Username</td>
                   <td><input type="text" name="username" autocomplete="off" required autofocus class="textInput"></td>
               </tr>               
               <tr>

                <tr>
                <td>Contact</td>
                <td><input type="text" name="contact" autocomplete="off" required class="textInput"></td>
            </tr>     

                <td>Email</td>
                <td><input type="text" name="email" autocomplete="off" required class="textInput"></td>
            </tr>               
            <tr>

            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required class="textInput"></td>
            </tr>               
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" name="password2" required class="textInput"></td>
            </tr>
            <td></td>
            <td><div id="pass_err" style="color:red"><?php echo $msg;?></div></td>               
            <tr>
                <td></td>
                <td><input type="submit" name="register_btn" value="Register" class="btn"></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <td></td>
                <td><a href="login.php">Already Have An Account !!</a></td>
           </table> 
        </div>
        </form>
        </center>
    </body>
</html>