<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main</title>

<!-- stylesheet -->
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.0/css/line.css">
<link rel="stylesheet" href="./css/main.css">

    <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js"
        type="application/javascript"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="./scripts/jquery.min.js"></script>
   <script defer src="./scripts/wallet.js"></script>
  <link rel="stylesheet" href="./css/popup.css">
<script src="./scripts/popup.js"></script>

</head>
<body>
    <!-- popup for login  -->







    <!-- ================================================= -->

    <?php

    session_start();

  


    if(isset($_SESSION['username'])){
        echo "<h1 id='red' style='color:red; display:none; '>".$_SESSION['username']." </h1>";

       
    }
    include 'navbar.php';
    
    ?>
    <!-- <script>
        alert("Welcome"+document.querySelector('#red').innerHTML);
    </script> -->
    <!-- ================================================= -->


    <section class="main-section" >
        <div class="main-content">
            <div class="main-title">
             
                <h1>
                    NFTGRAM
                </h1>   
                
                <h3>Join the NFT craze!!!</h3>
            </div>
            <?php
            
            if(isset($_SESSION['username'])){
       echo '<div class="scroll"><i class="uil uil-arrow-down"></i></div>';

            }else{
                echo '<div class="login-msg" >Please Login to continue</div>';

            }

            
            ?>
           
        </div>
    </section>

<!-- <script src="./scripts/wallet.js"></script> -->
<section class="explore-section" id="head">

<?php

 
if(isset($_SESSION['username'])){
    echo " <div class='head'>
    <h2>Explore</h2>
    
    <div class='filter'>
        
        <select name = 'fetchval' id = 'fetchval' >
        <options value = '' disabled selected = ''>Select Filter</option>
        <option>By Token ID</option>
        <option>By Price Low to High</option>
        <option>By Price High to Low</option>
        <option>By Date </option>
        
        
        </select>
      
    </div>
    
    </div>";

   
}



?>
<style>

.filter{
    position: relative;
    background-color: #000;
    margin:0;
    width:fit-content;
    padding:0;

}




</style>

   

    <?php
    
    if(isset($_SESSION['username'])){
        echo " <div class='explore-grid'></div>";

       
    }
    ?>
    
   

<!-- posts -->

<script>


$(document).ready(function(){
    $(".explore-grid").load("displayPost.php",{
        newCount : 8,
        filterVal : 'tokenID'

    });
var count = 8;
var filter = 'tokenID'

$('#fetchval').on('change',function(){
    filter = $(this).val();
    console.log(filter);

    $(".explore-grid").load("displayPost.php",{
        newCount : count,
        filterVal : filter

    });
})
$("#load_more").click(function(){
    count = count + 8;

    $(".explore-grid").load("displayPost.php",{
        newCount : count,
        filterVal : filter

    });
})

});

</script>












       
    

    </section>

    <?php
    
    if(isset($_SESSION['username'])){
        echo " <h2 id='load'>
        <div id='load_more'>
            load more
        </div>
        </h2> ";

       
    } 
    
    ?>
   


    <footer>
        <h2>NFTGRAM</h2>
        <ul class="social">
            <li><a href="#"><i class="uil uil-instagram"></i></a></li>
            <li><a href="#"><i class="uil uil-twitter"></i></a></li>
            <li><a href="#"><i class="uil uil-slack-alt"></i></a></li>
            
        </ul>
        <ul class="footer-nav">
            <li><a  href="about.html">About</a></li>
            <div class="right-border"></div>
            <li><a href="./privacy.html">Privacy-Policy</a></li>
            <div class="right-border"></div>

            <li><a href="./dmca.html">DMCA</a></li>
            <div class="right-border"></div>

            <li><a href="userGuide.html">User-Guide</a></li>
        </ul>

        <h4><i class="uil uil-copyright"></i> NFTGRAM All rights reserved.
            
            </h4>
      
    </footer>

<?php

if(!isset($_SESSION['username'])){
// echo" <div class='popup'> 
// <div class='popup-content'>
   
//     <h3> Please Login to Continue </h3>
//     <a href='login.php'>Login</a>
// </div>";
   
}
   
       
       
       ?>

       <script src="./scripts/popup.js"></script>
</body>
</html>