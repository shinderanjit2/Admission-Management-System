<?php
session_start();
if(!isset($_SESSION['username']))
{
    echo "<script>alert('You must login first !!')</script>";
    echo "<script>location.href='student_login.php'</script>";
}
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="shortcut icon" href="fav3.png" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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

            .btn
            {
                color:white;
                background-color:#009879;
                border:none;
                border-radius:4px;
                cursor:pointer;
                width:140px;
                padding:6px;
                margin:20px 5px;
                text-align:center;
                font-size:15px;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                box-shadow: 4px 4px 2px grey;
            }

            .del
            {
                color:white;
                background-color:red;
                border:none;
                border-radius:4px;
                width:60px;
                padding:6px;
                text-align:center;
                cursor:pointer;
                font-size:15px;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .up
            {
                color:white;
                background-color:green;
                border:none;
                border-radius:4px;
                width:120px;
                padding:6px;
                text-align:center;
                cursor:pointer;
                font-size:15px;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .content-table
            {
                border-collapse:collapse;
                margin: 10px 0;
                border-radius: 5px 5px 0 0;
                overflow: hidden;
                box-shadow: 0,0,0,0.15;            
            }
            .content-table thead tr
            {
                background-color: #009879;
                color: #FFFFFF;
                text-align: center;
                font-weight: bold;
                
            }
            .content-table th,
            .content-table td
            {
                padding: 10px 15px;
                text-align:center;
            }

            th:first-child, td:first-child
            {
                text-align:left;
            }

            .content-table tbody tr
            {
                border-bottom: 1px solid #dddddd;
            }
            tr:hover
            {
                font-weight:bold;
                color:#009879;        
                background-color:#f3f3f3;
            }

        </style>
    </head>
    <body>
        <div class="header">
            <h1>SOMESHWAR POLYTECHNIC COLLEGE SOMESHWARNAGAR</h1>
            <p>A Ranjit Shinde Website</p>
        </div>

        <center>
            <a href="logout.php"><button class="btn">LOGOUT</button></a>
        <center>

        <div style="overflow-x:auto;">
        <table class="content-table">
            <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Mail</th>
                <th>VIEW FORM</th>
                <th>STATUS</th>
                <th>REMARKS</th>
                <th>DELETE</th>
            </tr>
        </thead>

        <?php
            date_default_timezone_set('Asia/Kolkata');
        ?>
            <?php
                $con=mysqli_connect('localhost','root','');

                mysqli_select_db($con,'collegedb');

                $sql="select * from admission";

                $records=mysqli_query($con,$sql);

                if($records->num_rows>0)
                {
                    $no=1;
                    while($row=mysqli_fetch_array($records))
                    {
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>".$no."</td>";
                        echo "<td>".$row['username']."</td>";
                        echo "<td>".$row['fname']."</td>";
                        echo "<td>".$row['address']."</td>";
                        echo "<td>".$row['contact']."</td>";
                        echo "<td>".$row['mail']."</td>";
                        echo "<td><a href=checkform.php?id=".$row['no']."><button class='up'>CHECK FORM</button></a></td>";
                        echo "<td>".$row['status']."</td>";
                        echo "<td>".$row['remarks']."</td>";
                        echo "<td><a href=delete.php?id=".$row['no']."><button class='del'>DELETE</button></a></td>";

                        echo "</tbody>";
                        $no++;
                    }

                }
                else
                {
                    print "<font color='red'> No Records Found !!";
                }
            ?>
        </table>
    </body>
</html>