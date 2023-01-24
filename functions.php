<?php
    require("config.php");

    function getUsersData($no)
    {
        $array=array();
        $q=mysqli_query("SELECT * FROM 'registration' WHERE 'no'=".$no);
        while($r=mysqli_fetch_assoc($q))
        {
            $array['no']=$r['no'];
            $array['username']=$r['username'];
            $array['email']=$r['email'];
            $array['prn']=$r['prn'];
            $array['password']=$r['password'];
        }
        return $array;
    }
    function getId($username)
    {
        $con=mysqli_connect("localhost","root","","collegedb");
        $q=mysqli_query($con,"SELECT 'no' FROM 'registration' WHERE 'username'='".$username."'");
        while($r=mysqli_fetch_assoc($q))
        {
            return $r['no'];
        }
    }
?>