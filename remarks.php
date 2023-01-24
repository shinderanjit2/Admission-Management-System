<?php 
                                        include("config.php");
                                        //$sql="select *from admission where no='$_GET[id]'";
                                        // $records=mysqli_query($con,$sql);
                                        // $row=mysqli_fetch_array($records);

                                        $remarks=$_POST['remarks'];

                                        $sql="UPDATE admission SET remarks ='$remarks' WHERE no='$_GET[id]'";

                                        if(mysqli_query($con,$sql))
                                        {
                                            //echo "<script>alert('Record Updated Successfully !!')</script>";
                                            //echo "<script>location='dashboard.php';</script>";
                                        }
                                        else
                                        {
                                            echo "Not Updated";
                                        }

                                        ?>