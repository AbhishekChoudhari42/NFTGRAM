<?php
include 'db.php';
    session_start();
    $username = $_SESSION['username'];


  
if( $_FILES['file']['name']){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        
        $filename = $_FILES["file"]["name"];
        $filetype = $_FILES["file"]["type"];
        $filesize = $_FILES["file"]["size"];
    if($_POST['postname']){
        $postname =  $_POST['postname'];
        // $checkPostname = "select * from post where postname = '$postname';";
        // $pRes = mysqli_query($con,$checkPostname);

}

$price = $_POST['price']; 
$tokenID = $_POST['tokenID']; 
echo"$tokenID";
$description = $_POST['desc']; 



       







        // Validate file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Validate file size - 10MB maximum
        $maxsize = 10 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Validate type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/".$filename)){
                echo $filename . " is already exists.";
            } else{
                if(move_uploaded_file($_FILES["file"]["tmp_name"], "post/upload/".$filename)){

                    $sql = "insert into post(token_id, username, postname,post_content,post_description,price)
        
                         values('$tokenID','$username','$postname','upload/$filename','$description',$price)";
                    
                    mysqli_query( $con,$sql);

                    echo "Your file was uploaded successfully.";
                }else{

                   echo "File is not uploaded";
                }
                
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } 

?>