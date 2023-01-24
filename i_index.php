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
  if (isset($_POST['iupload'])) {
  
    $filename = $_FILES["income_certificate"]["name"];
    $tempname = $_FILES["income_certificate"]["tmp_name"];
        $folder = "income_certificate/".$filename;
          
    $db = mysqli_connect("localhost", "root", "", "collegedb");
  
        // Get all the submitted data from the form
        $sql = "UPDATE admission SET income_certificate='$filename' where username='$_SESSION[username]'";
  
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