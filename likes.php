<?php
    


    include 'db.php';
    
    
    
    if(isset($_POST['how'])){
         $token_id = $_POST['data']; 
         session_start();

        $user = $_SESSION['username'];

    

        $query = "select likedPost , likedBy from likestable
            where likedPost = $token_id and likedBy = '$user'" ;

        $res = mysqli_query($con,$query);
        if(mysqli_num_rows($res)==0){
            $updateQuery1 = "update post set likes = likes + 1 where token_id=$token_id ";
         $uq = mysqli_query($con,$updateQuery1);
         if($uq){
             $insert = "insert into likestable(likedPost,likedBy) values($token_id,'$user') ";
             mysqli_query($con,$insert);
         }
         
            $likes = "select likes from post where token_id = $token_id ";
            $res = mysqli_query($con,$likes);
            $likeCount = mysqli_fetch_assoc($res);
            $likes = $likeCount['likes'];
            $flag = 0;
            echo  $likes."|".$flag;
         

        }else if(mysqli_num_rows($res)==1){
            $updateQuery2 = "update post set likes = likes - 1 where token_id=$token_id ";
            $uq2 = mysqli_query($con,$updateQuery2);
            if($uq2){
                $delete = "delete from likestable
                 where likedPost = $token_id and likedBy = '$user'" ;
                mysqli_query($con,$delete);
            }
           
            $likes = "select likes from post where token_id = $token_id ";
            $res = mysqli_query($con,$likes);
            $likeCount = mysqli_fetch_assoc($res);
            $likes = $likeCount['likes'];
            $flag = 1;
            echo  $likes."|".$flag;

        }
    }
    

?>