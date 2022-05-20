<?php

echo"efrwe";
if(isset($_POST['upload'])){
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileType = $_FILES['file']['type'];
    $fileError = $_FILES['file']['error'];

    $postname = $_POST['postname'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
echo"$price";
echo"$fileName";
echo"$desc";
echo"$postname";
echo"fdfsfdf";
    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg','jpeg','png');

    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $fileNameNew = uniqid('',true).$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                echo "hhjhjhj";
  
                $q = "insert into post(uid, postname, post_content, post_description, price) values (3,'$postname','$fileDestination','$desc','$price');";
                mysqli_query($con,$q);


                header("location:MyAccount.php");
            }
        }else{
            echo "error";
        }


    }
    else{
        echo "file extension is wrong";
    }


}


?>