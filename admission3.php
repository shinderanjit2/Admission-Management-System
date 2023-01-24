<?php
session_start();

if(!isset($_SESSION['username']))
{
    echo "<script>alert('You must login first !!')</script>";
    echo "<script>location.href='login.php'</script>";
}
?>

<!DOCTYPE html>
<html>
  
<head>
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
            .h1
            {
                color:green;
            }
            .button
            {
                font-size:20px;
                padding:10px;
                border-radius:4px;
                color:white;
                background-color:red;
                cursor:pointer;

            }
</style>
<script>
    function alert()
    {
        window.alert("Successfull..!!");
    }
</script>
</head>
  
<body onload="alert()">
        <div class="header">
            <h1>SOMESHWAR POLYTECHNIC COLLEGE SOMESHWARNAGAR</h1>
            <p>A Ranjit Shinde Website</p>
        </div>

    <a href="profile.php"><button>PROFILE</button></a>
    
    <center>
        <h1 class="h1">YOUR FORM IS SUBMITTED SUCCESSFULLY..!!</h1>
        <h3>GO TO PROFILE AND CHECK THE STATUS</h3>
        <a href="profile.php"><button class="button">PROFILE</button></a>
    </center>
</body>
  
</html>