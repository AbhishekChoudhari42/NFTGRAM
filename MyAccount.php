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
    
   
  

    $user = $_SESSION['username'];
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
            <h2 style='color:white;'>Your Posts ↴</h2>
            <div  class="explore-grid">

            </div>
     </div>

<script>

$(document).ready(function(){
    $(".explore-grid").load("displayMyPost.php");
    console.log('fdsfsd aadsfdsfsdfsfsf')

})

</script>
</body>
</html>