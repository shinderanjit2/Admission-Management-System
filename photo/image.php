<!DOCTYPE html>
<html>
  
<head>
    <title>Image Upload</title>
    <link rel="stylesheet" 
          type="text/css"
          href="style.css" />
</head>
  
<body>
    <div id="content">
  
        <form method="POST" action="index.php" enctype="multipart/form-data">
            <input type="file" name="uploadfile" value="" />
            <div>
                <button type="submit" name="upload">
                  UPLOAD
                </button>
            </div>
                <?php
    include("config.php");
                $q=mysqli_query($con,"select * from image");

            ?>
            <?php
                $row=mysqli_fetch_assoc($q);

            ?>

            <div class="main">

                <table>
                    <tr>
                        <td>ID</td>
                        <td><?php echo $row['id']; ?></td>

                        <td>
                            <img src="<?php echo "image/".$row['filename'];?>" width="100px" alt="image">
                        </td>
                    </tr>
        </form>
    </div>
</body>
  
</html>