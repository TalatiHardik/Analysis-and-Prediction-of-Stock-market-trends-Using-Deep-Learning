
<?php

session_start();
$username = $_SESSION['username'];
$target_Folder = "upload/";


$target_Path = $target_Folder.basename( $_FILES['uploadimage']['name'] );

$savepath = $target_Path.basename( $_FILES['uploadimage']['name'] );

    $file_name = $_FILES['uploadimage']['name'];

    if(file_exists('upload/'.$file_name))
{
    //echo "<script>alert('That File Already Exisit')</script>";
    header('location: profile.php');
    }
    else
    {

        // Database 
    	$con=mysqli_connect("localhost","root","","registration"); //Change it if required

//Check Connection
        if(mysqli_connect_errno())
        {
           // echo "<script>alert('Failed to connect to database')</script>" .     mysqli_connect_errno();
        	header('location: profile.php');
        }

        $sql = "UPDATE details SET photo = '$target_Folder$file_name' WHERE username = '$username'";

        if (!mysqli_query($con,$sql))
        {
            die('Error: ' . mysqli_error($con));
        }
        // Move the file into UPLOAD folder

        move_uploaded_file( $_FILES['uploadimage']['tmp_name'],     $target_Path );
        mysqli_close($con);
        header('location: profile.php');
        

        echo "File Uploaded <br />";
        echo 'File Successfully Uploaded to:&nbsp;' . $target_Path;
        echo '<br />';  
        echo 'File Name:&nbsp;' . $_FILES['uploadimage']['name'];
        echo'<br />';
        echo 'File Type:&nbsp;' . $_FILES['uploadimage']['type'];
        echo'<br />';
        echo 'File Size:&nbsp;' . $_FILES['uploadimage']['size'];

    }
?>

