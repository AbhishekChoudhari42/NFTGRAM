<?php


include 'db.php';

$q = "select * from user where username LIKE '%{$_POST['name']}%';";
// $q = "select * from user where username = 'aaa'";

$result = mysqli_query($con,$q);
echo"$q";
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        echo"<div class='result'>
            ".$row['username']."
        
        </div>";
    }
}else{
    echo"";
}


?>