<?php
session_start();

if(!isset($_SESSION['username']))
{
    echo "<script>alert('You must login first !!')</script>";
    echo "<script>location.href='login.php'</script>";
}
?>

<?php
    require("functions.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            *
            {
                font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            }

        .header
        {
                padding: 40px;
                background-color: forestgreen;
                text-align: center;
        }
        .header label
        {
                color: white;
                font-size: 50px;
        }

        .main
        {
            margin:40px;
        }

        .label
        {
            font-weight:bold;
        }

        .adbutton
        {
            font-size:20px;
            background-color:DodgerBlue;
            color:white;
            border-radius:4px;
            margin: 20px 0;
            cursor:pointer;
        }

        .logout
        {
                position:absolute;
                right: 0;
                cursor:pointer;
                margin:10px;
        }

        </style>
    </head>
    <body>
    <header class="header"><label>Somewshwar Polytechnic College Someshwarnagar</label></header>
            <a href="logout.php"><button class="logout">LOGOUT</button></a>
        <center>

            <?php
                $q=mysqli_query($con,"select * from registration where username='$_SESSION[username]';");

            ?>
            <?php
                $row=mysqli_fetch_assoc($q);

            ?>

            <div class="main">
                    
                <table>
                    <tr>
                        <td><label class="label">Username</label></td>
                        <td><?php echo $_SESSION['username']; ?></td>
                    </tr>
                    <tr>
                        <td><label class="label">Contact No</label></td>
                        <td><?php echo $row['contact']; ?></td>
                    </tr>
                    <tr>
                        <td><label class="label">EMail</label></td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>

                </table>

                <a href="admission.php"><button class="adbutton">FILL THE ADMISSION FORM</button></a>
                <a href="dadmission.php"><button class="adbutton">VIEW THE ADMISSION FORM</button></a>
                <a href="admission2.php"><button class="adbutton">VIEW THE DOCUMENTS</button></a>
            </div>

        </center>
    </body>
</html>