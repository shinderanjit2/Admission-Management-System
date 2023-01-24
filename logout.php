<?php

session_start();
session_destroy();
unset($_SESSION['username']);
echo "<script>alert('LOGOUT SUCCESSFULL !!')</script>";
echo "<script>location.href='login.php'</script>";

?>