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
            .header
            {
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

            .back
            {
                font-size:18px;
                position:absolute;
                left:0;
                cursor:pointer;
                margin:10px;
                background-color:DodgerBlue;
                color:white;
                border-radius:4px;
            }

            button[type='submit']
            {
                background-color:brown;
                color:white;
                padding:8px;
                cursor:pointer;
                border:none;
                border-radius:4px;
            }

            .img
            {
                width:160px;
                height:180px;
                border:5px solid #555;
            }

            input[type=file]
            {
                cursor:pointer;
            }

            input[type=file]::file-selector-button
            {
                font-size:14px;
                color:white;
                background-color: #6c5ce7;
                border: none;
                padding:8px;
                border-radius:4px;
                transition:1s;
                cursor:pointer;
            }

            input[type=button]
            {
                color:white;
                background-color:green;
                width:80px;
                font-size:20px;
                cursor:pointer;
                padding:8px;
                border:none;
                border-radius:4px;
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
                border:1px solid grey;
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
</style>
</head>
  
<body>
        <div class="header">
            <h1>SOMESHWAR POLYTECHNIC COLLEGE SOMESHWARNAGAR</h1>
            <p>A Ranjit Shinde Website</p>
        </div>

    <a href="profile.php"><button class="back">BACK</button></a>
    
    <center>
        <table class="content-table">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Chose File</th>
                    <th>Upload</th>
                    <th>File</th>

                </tr>
            </thead>

            <tr>
                <form method="POST" action="index.php" enctype="multipart/form-data">
                    <tr>
                        <td>5</td>
                        <td>Income Certificate</td>
                        <td>
                            <input type="file" name="profile" value="" />
                            <div>
                                <button type="submit" name="upload">UPLOAD</button>
                            </div class="button">
                        </td>

                            <?php include("config.php");
                                $q=mysqli_query($con,"select * from admission where username='$_SESSION[username]'");
                            ?>
                            <?php $row=mysqli_fetch_assoc($q); ?>

                        <td>
                            <img src="<?php echo "profile/".$row['profile'];?>" alt="image" class="img">
                        </td>
                            
                    </tr>
                </form>
            </tr>

            <tr>
                    <form method="POST" action="ly_index.php" enctype="multipart/form-data">
                        <tr>
                            <td>2</td>
                            <td>Last Year Result</td>
                            <td>
                                <input type="file" name="last_year_result" value="" />
                                <div>
                                    <button type="submit" name="ly_upload">UPLOAD</button>
                                </div class="button">
                            </td>

                                <?php include("config.php");
                                    $q=mysqli_query($con,"select * from admission where username='$_SESSION[username]'");
                                ?>
                                <?php $row=mysqli_fetch_assoc($q); ?>

                            <td>
                                <img src="<?php echo "last_year_result/".$row['last_year_result'];?>" alt="image" class="img">
                            </td>
                                
                        </tr>
                    </form>
            </tr>

            <tr>
                    <form method="POST" action="lcindex.php" enctype="multipart/form-data">
                        <tr>
                            <td>3</td>
                            <td>Leaving Certificate</td>
                            <td>
                                <input type="file" name="lc" value="" />
                                <div>
                                    <button type="submit" name="lcupload">UPLOAD</button>
                                </div class="button">
                            </td>

                                <?php include("config.php");
                                    $q=mysqli_query($con,"select * from admission where username='$_SESSION[username]'");
                                ?>
                                <?php $row=mysqli_fetch_assoc($q); ?>

                            <td>
                                <img src="<?php echo "lc/".$row['lc'];?>" alt="image" class="img">
                            </td>
                                
                        </tr>
                    </form>
            </tr>

            <tr>
                <form method="POST" action="cindex.php" enctype="multipart/form-data">
                    <tr>
                        <td>4</td>
                        <td>Cast Certificate</td>
                        <td>
                            <input type="file" name="cast_certificate" value="" />
                            <div>
                                <button type="submit" name="cupload">UPLOAD</button>
                            </div class="button">
                        </td>

                            <?php include("config.php");
                                $q=mysqli_query($con,"select * from admission where username='$_SESSION[username]'");
                            ?>
                            <?php $row=mysqli_fetch_assoc($q); ?>

                        <td>
                            <img src="<?php echo "cast_certificate/".$row['cast_certificate'];?>" alt="image" class="img">
                        </td>
                            
                    </tr>
                </form>
            </tr>

            <tr>
                <form method="POST" action="i_index.php" enctype="multipart/form-data">
                    <tr>
                        <td>5</td>
                        <td>Income Certificate</td>
                        <td>
                            <input type="file" name="income_certificate" value="" />
                            <div>
                                <button type="submit" name="iupload">UPLOAD</button>
                            </div class="button">
                        </td>

                            <?php include("config.php");
                                $q=mysqli_query($con,"select * from admission where username='$_SESSION[username]'");
                            ?>
                            <?php $row=mysqli_fetch_assoc($q); ?>

                        <td>
                            <img src="<?php echo "income_certificate/".$row['income_certificate'];?>" alt="image" class="img">
                        </td>
                            
                    </tr>
                </form>
            </tr>


        </table>

        <a href="admission3.php"><input type="button" name="submit" value="submit"></a>

    </center>
</body>
  
</html>