<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.0/css/line.css">
<script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
    <link rel="stylesheet" href="./css/MyAccount.css">
    
</head>
<body>
   <!-- ================================================= -->
   <nav>
       <img src="./assets/logo.png" alt="">


      


        <div class="nav-links">
            <li><a href="./index.php">Home</a></li>
            <li><a href="./MyAccount.php">My Account</a></li>
            <li><a href="#">Collection</a></li>
            <li><a  href="./userGuide.html">User Guide</a></li>

            <!-- <li>About</li> -->
        </div>

       





        <div class="nav-buttons">
            <h3 class="dark-mode">
                <!-- <i class="uil uil-moon"></i> -->
                <i class="uil uil-sun"></i>

            </h3>

            <?php
            session_start();

             if(isset($_SESSION['username'])){

            echo'<a style="text-decoration:none;padding:0.4rem 1.2rem;font-size:0.9rem;"  class="btn" id="create-btn" href="./create.php">Create</a>' ; }
           ?>

                
            <?php
             if(isset($_SESSION['username'])){
                 echo "<a style='text-decoration:none; padding:0.4rem 1.2rem;font-size:0.9rem; border:1px solid #222;'  class='btn' id='signin-btn' href='./logout.php'>logout</a>";
             }else{
                echo "<a style='text-decoration:none; padding:0.4rem 1.2rem;font-size:0.9rem; border:1px solid #222;' class='btn' id='signin-btn' href='./login.php'>login</a>";

             }
            ?>
        
       
            <!-- <input class="btn" id="signin-btn" type="button" value="Sign-in"> -->
        </div>
<!-- <script src="./scripts/wallet.js"></script> -->
    </nav>
   <?php
    require('db.php');
    
   
  

    $user = $_GET['username'];
    $e = "select * from user where username = '$user'";
    $res = mysqli_query($con,$e);
    $arr = mysqli_fetch_assoc($res);
    $email =  $arr['email'];
   
        
    

    ?>


    <!-- ================================================= -->



     <div class="account">
         <div style="background-image: url('./assets/main2.png');" class="banner">
           <div class="profile-pic-border">
            <img class="profile-pic" src="./assets/user.png" alt="">

           </div>
            

        </div>
        <div class="profile">
            <h2 class="username"><?php echo $user;?></h2>
            <h3><?php
            if($email){
                echo $email;

            }else{
                echo "email not found";
            }
            
            ?></h3>


        </div>
        <div class="user-posts">
            <h2 style='color:white;'>Posts ↴</h2>
            <div  class="explore-grid">

            <?php
include 'db.php';


function checkUserLikes($u,$p,$con){
    $q = "select likedPost , likedBy from likestable
    where likedPost = $p and likedBy = '$u'" ;
    $r = mysqli_query($con,$q);
    if(mysqli_num_rows($r)==0){
        echo "black";
    }
    if(mysqli_num_rows($r)==1){
        echo "red";
    }


}


//session_start();
$username =  $_GET['username'];
$g = "select * from post where username = '$username' ";

$r = mysqli_query($con,$g);
                  
if(mysqli_num_rows($r)>0){
    while($row = mysqli_fetch_assoc($r)){

?>
         <div class="main-element" id="<?php echo $row['token_id'];?>">
                            <div class="user-info">
                                <img class="user-profile-pic" src="./assets/user.png" alt="">
                                <h4 class="user-name"><?php echo $row['username'];?></h4>
                 
                 
                            </div>
                            
                            <!-- <img src="<?php echo $row['post_content'];?>" alt="" class="content"> -->
                            <div class="image" style="background-image:url('post/<?php echo $row['post_content'];?>');"></div>
                            <!-- <img src="post/<?php echo $row['post_content'];?>" alt="" class="content"> -->
                            <div class="nft-info">
                            <div class="post-info">
                                <?php //echo checkUserLikes($user,$token_id,$con); ?>
                                    <h3><?php echo $row['postname'];?> </h3>
                                    <h3 class="like" id =  "<?php echo $row['token_id'];?>" 
                                    title = "<?php echo $row['token_id'];?>">
                                    <span><?php echo $row['likes'];?></span>
                                    <img id="<?php echo $row['token_id'];?> " 
                                    src = 'assets/like2.png'
                                    class = '<?php echo checkUserLikes($user,$token_id,$con); ?>'></h3>
                                </div>
                               
                                <div class="price"><?php echo $row['price'];?>ETH</div>
                                <div style='font-size:0.8rem;' class="created"><?php echo $row['date'];?> </div>
                                <!-- <button class="buy">Buy</button> -->
                                <a class="buy" href="postPage.php?tokenID= <?php echo $row['token_id'];?>">View Post</a>

           
                            </div>
                        </div>
   
   
    
   
<?php                     
   
   
   

        
        
        
  
    }
}else{
    echo "no data";
}




?>
















            </div>
     </div>

<script>

// $(document).ready(function(){
//     $(".explore-grid").load("displayMyPost.php");
//     console.log('fdsfsd aadsfdsfsdfsfsf')

// })

</script>

<style>
.post-info h3 span{
    font-weight:400;
    margin-right:0.3rem;
}
.red{
    color:blue;
}
.post-info h3 img{
    width:18px;
    
}
img.red{
   animation: heart 1.5s infinite ease;
    
}
@keyframes heart {
    
    0%{
        transform:scale(1);
    }
    50%{
        transform:scale(1.3);
    }
    100%{
        transform:scale(1);
    }
}
img.black{
    filter:grayscale(100);
    animation: none;
    
}


  
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

        $('.like').on("click",function(){
            var token = $(this).attr("title");
            // $('#'+token+' img').css({'filter': 'invert(100)'})
            $('#'+token+' img').toggleClass('black');
            $('#'+token+' img').toggleClass('red');
            $.post("likes.php",
            {   data:token,
                how:'c'
            },
            function(data){
                if(data){

                    data = data.split("|");
                    $('.post-info #'+token+' span').text(data[0]); 

                   
                }
              

            });


        });


</script>
</body>
</html>