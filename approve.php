<?php 
        include("config.php");


    if(isset($_POST['submit']))
    {
            

       // $no='$_GET[id]';

        $status="APPROVED";
 
        if($con->connect_error)
        {
            die($con->connect_error);
        }

        //$sql="insert into patient(name,address,mobile,age,gender,date,time) values('".$n."','".$add."','".$mob."','".$a."','".$g."','".$d."','".$t."')";
        
        $sql="UPDATE patient SET status ='$status' WHERE no='$_GET[id]'";

        if(mysqli_query($con,$sql))
    {
        echo "<script>alert('Record Updated Successfully !!')</script>";
        echo "<script>location='pshow.php';</script>";
    }
    else
    {
        echo "Not Updated";
    }

} 
?>