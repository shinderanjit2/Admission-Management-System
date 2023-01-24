<?php
session_start();

if(!isset($_SESSION['username']))
{
    echo "<script>alert('You must login first !!')</script>";
    echo "<script>location.href='login.php'</script>";
}
?>


<?php
error_reporting(0);
?>
<?php
  $msg = "";
  
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  
    $filename = $_FILES["profile"]["name"];
    $tempname = $_FILES["profile"]["tmp_name"];
        $folder = "profile/".$filename;
          
    $db = mysqli_connect("localhost", "root", "", "collegedb");
  
        // Get all the submitted data from the form
        $sql = "UPDATE admission SET profile='$filename' where username='$_SESSION[username]'";
  
        // Execute query
        mysqli_query($db, $sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            echo "<script>alert('Successfull !!')</script>";
            echo "<script>location.href='admission2.php'</script>";

        }else{
            $msg = "Failed to upload image";
      }

   }
//   $result = mysqli_query($db, "SELECT * FROM image");
//   while($data = mysqli_fetch_array($result))
// {
  
       ?>
// <img src="<?php echo $data['profile']; ?>">
  
// <?php
// }

// ?>