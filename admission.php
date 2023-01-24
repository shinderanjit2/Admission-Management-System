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
                                $lname=$_POST['lname'];
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
                                $remarks="N/A";


                                $sql="insert into admission(username,fname,mname,lname,address,contact,mail,gender,dob,cast,category,religion,nationality,aadhar_no,coursec,coursen,institute,university,previous,previous_class_percentage,ssc_percentage,hsc_percentage,status,remarks)values('".$username."','".$fname."','".$mname."','".$lname."','".$address."', '".$contact."', '".$mail."','".$g."','".$dob."','".$cast."','".$category."','".$religion."','".$nationality."','".$aadhar."','".$coursec."','".$coursen."','".$institute."','".$uni."','".$prev."','".$prev_class_per."','".$ssc_per."','".$hsc_per."','".$status."','".$remarks."')";    

                                if($con->query($sql)==true)       
                                {
                                        echo "<script>alert('Information Uploaded Successfully..!!')</script>";
                                        echo "<script>location.href='admission2.php'</script>";
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
        
        .profile
        {
                position:absolute;
                left:0;
                cursor:pointer;
                margin:0px 10px;
                width:60px;
                border-radius:80px;
        }

        .register
        {
                font-size: 30px;
        }
        input[type="submit"]
        {
                color:white;
                background-color: blue;
                font-size: 20px;
                padding: 10px;
                border: none;
                border-radius: 60px;
                width:100px;
                box-shadow: 4px 5px 1px grey;
                cursor: pointer;
        }
        input[type="reset"]
        {
                color:blue;
                background-color: white;
                font-size: 20px;
                padding: 10px;
                border:none;
                border-radius: 60px;
                width: 100px;
                box-shadow: 4px 5px 1px grey;
                cursor: pointer;
        }

</style>
        <body>
                <center>
                        <header class="header"><label>Somewshwar Polytechnic College Someshwarnagar</label></header>
                        <div class="main">
                                <a href="profile.php"><img src="avatar.png" class="profile"></a>
                                <?php
                                        $con=mysqli_connect('localhost','root','');

                                        mysqli_select_db($con,'collegedb');
                                        $sql="select * from admission where username='$_SESSION[username]'";
                                        $records=mysqli_query($con,$sql);
                                        if($records->num_rows>0)
                                        {
                                                echo "<font color='red'><h2> You Have Already Filled The Admission Form..!!</h2></font>";
                                        }
                                ?>
                                <form method="POST" action="admission.php">

                                        <label class="register">Register Here</label>
                                        <table>
                                                <tr><td><h3>Personal Information</h3></td></tr>
                                                <tr>
                                                        <td>First Name</td>
                                                        <td><input type="text" name="fname"></td>

                                                        <td>Middle Name</td>
                                                        <td><input type="text" name="mname"></td>

                                                        <td>Last Name</td>
                                                        <td><input type="text" name="lname"></td>
                                                </tr>

                                                <tr>
                                                        <td>Address</td>
                                                        <td>
                                                                <textarea class="textarea" name="address"></textarea>
                                                        </td>
                                                        <td>Contact No.</td>
                                                        <td><input type="text" name="contact"></td>
                                                
                                                        <td>E-Mail</td>
                                                        <td><input type="text" name="mail"></td>
                                                </tr>

                                                <tr>

                                                        <td>Date Of Birth</td>
                                                        <td><input type="date" name="dob"></td>

                                                        <td>Gender</td>
                                                        <td>
                                                                <select name="gender">
                                                                        <option name="gender" value="Male">Male</option>
                                                                        <option name="gender" value="Female">Female</option>
                                                                </select>
                                                        </td>

                                                        <td>Cast</td>
                                                        <td><input type="text" name="cast"></td>
                                                </tr>

                                                <tr>

                                                        <td>Category</td>
                                                        <td><select name="category">
                                                                <option name="category" value="OPEN">OPEN</option>
                                                                <option name="category" value="SC">SC</option>
                                                                <option name="category" value="ST">ST</option>
                                                                <option name="category" value="OBC">OBC</option>
                                                                <option name="category" value="SBC">SBC</option>
                                                                <option name="category" value="SEBC">SEBC</option>
                                                                <option name="category" value="VJ">VJ</option>
                                                                <option name="category" value="NT-B">NT-B</option>
                                                                <option name="category" value="NT-C">NT-C</option>
                                                                <option name="category" value="NT-D">NT-D</option>
                                                        </select></td>

                                                        <td>Religion</td>
                                                        <td><input type="text" name="religion"></td>

                                                        <td>Nationality</td>
                                                        <td><input type="text" name="nationality"></td>

                                                </tr>

                                                <tr>
                                                        <td>Aadhar Details</td>
                                                        <td><input type="text" name="aadhar"></td>
                                                </tr>

                                                <tr><td><h3>Academic Information</h3></td></tr>
                                                <tr>
                                                        <td>Course Code</td>
                                                        <td><input type="text" name="coursec"></td>

                                                        <td>Course Name</td>
                                                        <td><select name="coursen">
                                                                <option>COMPUTER ENGINEERING</option>
                                                                <option>MECHANICAL ENGINEERING</option>
                                                                <option>CIVIL ENGINEERING</option>
                                                                <option>ELECTRICAL ENGINEERING</option>
                                                                <option>ARTIFICIAL INTELLIGENCE</option>
                                                        </select></td>
                                                                                                        
                                                </tr>
                                                

                                                <tr>
                                                        <td>Institute Name</td>
                                                        <td><input type="text" name="institute"></td>

                                                        <td>Home University</td>
                                                        <td>
                                                                <input type="text" name="university" value="Savitribai Phule Pune University" style="width: 212px; background-color: lightblue; font-weight: bold;" disabled>
                                                        </td>

                                                        <td>Previous Institute</td>
                                                        <td><input type="text" name="previous"></td>
                                                
                                                </tr>

                                                <tr>
                                                        <td>Previous Class Percentage</td>
                                                        <td><input type="text" name="previous_class_percentage"></td>
                                                        
                                                        <td>SSC Percentage</td>
                                                        <td><input type="text" name="ssc_percentage"></td>

                                                        <td>HSC Percentage</td>
                                                        <td><input type="text" name="hsc_percentage"></td>
                                                </tr>

                                        </table>
        <br><br>
                                        <input type="reset" name="reset" value="Reset">
                                        <input type="submit" name="submit" value="Next">
                                </form>
                        </div>
                </center>
        </body>
</html>