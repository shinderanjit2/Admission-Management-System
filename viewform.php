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
?>
<?php
    if(isset($_REQUEST['gender']))
    {
        $g=$_REQUEST['gender'];
    }
?>



                        <?php
                        if(isset($_POST['submit']))

                        {
                                $username=$_SESSION['username'];
                                $fname=$_POST['fname'];
                                $mname=$_POST['mname'];
                                $sname=$_POST['sname'];
                                $address=$_POST['address'];
                                $contact=$_POST['contact'];
                                $mail=$_POST['mail'];
                                $dob=$_POST['dob'];
                                $cast=$_POST['cast'];
                                $category=$_POST['category'];
                                $religion=$_POST['religion'];
                                $nationality=$_POST['nationality'];
                                $aadhar=$_POST['aadhar'];
                                $coursec=$_POST['coursec'];
                                $coursen=$_POST['coursen'];
                                $institute=$_POST['institute'];
                                $uni="Savitribai Phule Pune University";
                                $prev=$_POST['previous'];
                                $prev_class_per=$_POST['previous_class_percentage'];
                                $ssc_per=$_POST['ssc_percentage'];
                                $hsc_per=$_POST['hsc_percentage'];
                                $status="Under Process";


                                $sql="insert into admission(username,fname,mname,sname,address,contact,mail,gender,dob,cast,category,religion,nationality,aadhar_no,coursec,coursen,institute,university,previous,previous_class_percentage,ssc_percentage,hsc_percentage,status)values('".$username."','".$fname."','".$mname."','".$sname."','".$address."', '".$contact."', '".$mail."','".$g."','".$dob."','".$cast."','".$category."','".$religion."','".$nationality."','".$aadhar."','".$coursec."','".$coursen."','".$institute."','".$uni."','".$prev."','".$prev_class_per."','".$ssc_per."','".$hsc_per."','".$status."')";    

                                if($con->query($sql)==true)       
                                {
                                        echo "Registration Successfully";
                                        //echo "<script>location.href='admission2.php'</script>";
                                }
                                else{
                                        echo "Error";
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
                font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
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
                font-size:18px;
                position:absolute;
                right:0;
                cursor:pointer;
                margin:10px;
                background-color:DodgerBlue;
                color:white;
                border-radius:4px;
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

        .register
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
                margin: 40px 0;
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

</style>
        <body>
                
        <div class="header">
            <h1>HOSPITAL RECEPTION</h1>
            <p>A Ranjit Shinde Website</p>
        </div>
                        <a href="dadmission.php"><button class="back">Back</button></a>
                            
                                <?php 
                                    include("config.php");

                                    date_default_timezone_set('Asia/Kolkata');

                                    $sql="select *from admission where username='$_SESSION[username]'";
                                    $records=mysqli_query($con,$sql);
                                    $row=mysqli_fetch_array($records);
                                ?>

                                <center>

                                                <table class="content-table">
                                                <tr><td><h3>Personal Information</h3></td></tr>
                                                <tr>
                                                    <td>
                                                        <img src="<?php echo "profile/".$row['profile'];?>" class="img" width="100px" height="100px" alt="image">
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

                                                <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td><label class="label">Application Type</label>
                                                        <?php echo $row['status'];?></td>
                                                </tr>

                                        </table>                                </center>
        </body>
</html>