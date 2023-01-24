<?php
session_start();

if(!isset($_SESSION['username']))
{
    echo "<script>alert('You must login first !!')</script>";
    echo "<script>location.href='login.php'</script>";
}
?>

<?php 
        include("config.php");


    if(isset($_POST['submit']))
    {
            

       // $no='$_GET[id]';

        $status="APPROVED";
        $remarks="N/A";
 
        if($con->connect_error)
        {
            die($con->connect_error);
        }

        //$sql="insert into patient(name,address,mobile,age,gender,date,time) values('".$n."','".$add."','".$mob."','".$a."','".$g."','".$d."','".$t."')";
        
        $sql="UPDATE admission SET status ='$status', remarks='$remarks' WHERE no='$_GET[id]'";

        if(mysqli_query($con,$sql))
    {
        echo "<script>alert('Application Approved Successfully !!')</script>";
        echo "<script>location='dashboard.php';</script>";
    }
    else
    {
        echo "Not Updated";
    }

} 
?>

<!DOCTYPE html>
<html>
        <head>
                <title>ADMISSION PAGE 1</title>
                <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
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
        
        .profile
        {
                position:absolute;
                right:0;
                margin:10px;
                background-color:dodgerblue;
                color:white;
                cursor:pointer
        }

        .back
        {
                position:absolute;
                left:0;
                margin:10px;
                background-color:dodgerblue;
                color:white;
                cursor:pointer

        }

        .username
        {
                font-size:30px;
                font-weight:bold;
                color:red;
        }

        .label
        {
                font-weight:bold;
        }

        .content-table
            {
                border-collapse:collapse;
                margin: 20px 0;
                border-radius: 5px 5px 0 0;
                overflow: hidden;
                box-shadow: 0,0,0,0.15;            
            }

            .content-table th,
            .content-table td
            {
                padding: 5px 50px;
            }

        .content-table td
        {
                //padding:5px;
        }

        .document-table
        {
                border-collapse:collapse;
                margin:20px 0;
                border-radius:px;
        }

        .document-table th,
        .document-table td
        {
                //padding: 50px 0px;
                padding: 40px;
                border: 1px solid #555;
                background-color:lightgrey;
        }

        .d-label
        {
                font-size:20px;
                font-weight:bold;
        }
        
        .img
        {
                width:700px;
                height:800px;
                border: 4px solid #555;
                margin:20px;
        }


        .approve
        {
                cursor:pointer;
                background-color:green;
                color:white;
                padding:10px;
                margin:10px;
                font-size:20px;
                border:none;
                border-radius:4px;
                box-shadow: 4px 6px 2px grey;
        }

        .remarks
        {
                cursor:pointer;
                background-color:green;
                color:white;
                padding:10px;
                margin:10px;
                font-size:20px;
                border:none;
                border-radius:4px;
                box-shadow: 4px 6px 2px grey;
        }

        .modal
        {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                padding-top: 100px; /* Location of the box */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content
        {
                background-color: #fefefe;
                margin: auto;
                padding: 20px;
                border: 1px solid #888;
                width: 80%;
        }

        /* The Close Button */
        .close
        {
                color: #aaaaaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
        }

        .close:hover,
        .close:focus
        {
                color: #000;
                text-decoration: none;
                cursor: pointer;
        }

</style>
        <body>
                
        <div class="header">
            <h1>HOSPITAL RECEPTION</h1>
            <p>A Ranjit Shinde Website</p>
        </div>

                                <?php 
                                    include("config.php");
                                    $sql="select *from admission where no='$_GET[id]'";
                                    $records=mysqli_query($con,$sql);
                                    $row=mysqli_fetch_array($records);
                                ?>
                                <a href="profile.php"><button class="profile">Profile</button></a>
                                <a href="dashboard.php"><button class="back">Back</button></a>
                                <center>

                                        <label class="username"><td><?php echo $row['username'];?></td></label>
                                        <div style="overflow-x:auto;">
                                        <table class="content-table">
                                                <tr><td><h3>Personal Information</h3></td></tr>
                                                <tr>
                                                    <td>
                                                        <img src="<?php echo "profile/".$row['profile'];?>" width="100px" height="100px" alt="image">
                                                    </td>
                                                </tr>
                                                <tr>
                                                        <td><label class="label">Full Name</label>
                                                        <?php echo $row['fname'];?> <?php echo $row['mname'];?> <?php echo $row['lname'];?> </td>

                                                        <td><label class="label">Address</label>
                                                        <?php echo $row['address'];?></td>

                                                        <td><label class="label">Contact No</label>
                                                        <?php echo $row['contact'];?></td>
                                                </tr>

                                                <tr>
                                                        <td><label class="label">E-Mail</label>
                                                        <?php echo $row['mail'];?></td>

                                                        <td><label class="label">Date Of Birth</label>
                                                        <?php echo $row['dob'];?></td>

                                                        <td><label class="label">Gender</label>
                                                        <?php echo $row['gender'];?></td>
                                                </tr>

                                                <tr>

                                                        <td><label class="label">Cast</label>
                                                        <?php echo $row['cast'];?></td>

                                                        <td><label class="label">Category</label>
                                                        <?php echo $row['category'];?></td>

                                                        <td><label class="label">Religion</label>
                                                        <?php echo $row['religion'];?></td>
                                                </tr>

                                                <tr>

                                                        <td><label class="label">Nationality</label>
                                                        <?php echo $row['nationality'];?></td>

                                                        <td><label class="label">Aadhar Detail</label>
                                                        <?php echo $row['aadhar_no'];?></td>

                                                </tr>

                                                <tr><td><h3>Academic Information</h3></td></tr>
                                                <tr>
                                                        <td><label class="label">Course Code</label>
                                                        <?php echo $row['coursec'];?></td>

                                                        <td><label class="label">Course Name</label>
                                                        <?php echo $row['coursen'];?></td>
                                                

                                                <tr>
                                                        <td><label class="label">Institute Name</label>
                                                        <?php echo $row['institute'];?></td>

                                                        <td><label class="label">Home University</label>
                                                        <?php echo $row['university'];?>
                                                        </td>

                                                        <td><label class="label">Previous Institute</label>
                                                        <?php echo $row['previous'];?></td>
                                                
                                                </tr>

                                                <tr>
                                                        <td><label class="label">Previous Class Percentage</label>
                                                        <?php echo $row['previous_class_percentage'];?></td>
                                                        
                                                        <td><label class="label">SSC Percentage</label>
                                                        <?php echo $row['ssc_percentage'];?></td>

                                                        <td><label class="label">HSC Percentage</label>
                                                        <?php echo $row['hsc_percentage'];?></td>
                                                </tr>

                                        </table>
                                        <hr>
                                        <center>
                                        <table class="document-table">
                                                <tr><h3>DOCUMENTS INFORMATION</h3></tr>
                                                <tr>
                                                        <td><label class="d-label">Last Year Result</label><br>
                                                        <img src="<?php echo "last_year_result/".$row['last_year_result'];?>" alt="image" class="img"></td>
                                                </tr>
                                                
                                                <tr>
                                                        <td><label class="d-label">Leaving Certificate</label><br>
                                                        <img src="<?php echo "lc/".$row['lc'];?>" alt="image" class="img"></td>
                                                </tr>
                                               
                                                <tr>
                                                        <td><label class="d-label">Cast Certificate</label><br>
                                                        <img src="<?php echo "cast_certificate/".$row['cast_certificate'];?>" alt="image" class="img"></td>
                                                </tr>  

                                                <tr>
                                                        <td><label class="d-label">Income Certificate</label><br>
                                                        <img src="<?php echo "income_certificate/".$row['income_certificate'];?>" alt="image" class="img"></td>
                                                </tr>  
                                        </table>
                                        </center>
                                        </div>
                                        <form action="" method="POST">
                                            <input type="submit" name="submit" value="APPROVE" class="approve">
                                        </form>

                                        <button class="remarks" name="remark" id="myBtn">ADD REMARK</button>

                                        <div id="myModal" class="modal">
                                                <!-- Modal content -->
                                                <div class="modal-content">
                                                        <form action="" method="POST">
                                                                <?php 
                                                                        include("config.php");
                                                                        $sql="select *from admission where no='$_GET[id]'";
                                                                        $records=mysqli_query($con,$sql);
                                                                        $row=mysqli_fetch_array($records);

                                                                        if(isset($_POST['submit1']))
                                                                        {
                                                                        $remarks=$_POST["remarks"];
                                                                        $status="Required Updation";

                                                                        if($con->connect_error)
                                                                        {
                                                                            die($con->connect_error);
                                                                        }
                                                                
                                                                        //$sql="insert into patient(name,address,mobile,age,gender,date,time) values('".$n."','".$add."','".$mob."','".$a."','".$g."','".$d."','".$t."')";
                                                                        
                                                                        $sql="UPDATE admission SET status='$status',remarks ='$remarks' WHERE no='$_GET[id]'";
                                                                
                                                                        if(mysqli_query($con,$sql))
                                                                    {
                                                                        echo "<script>alert('Remarks Added Successfully !!')</script>";
                                                                        echo "<script>location='dashboard.php';</script>";
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "Not Updated";
                                                                    }

                                                                        }
                                                                ?>

                                                                <span class="close">&times;</span>
                                                                <p>ADD REMARK</p>
                                                                <input type="text" name="remarks" value="<?php echo $row['remarks'];?>">
                                                                <input type="submit" name="submit1" value="Submit">
                                                        </form>
                                                </div>
                                        </div>        

                                        <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
        modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
        modal.style.display = "none";
        }
        }
</script>

                                </center>
        </body>
</html>