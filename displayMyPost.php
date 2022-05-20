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
session_start();
$username =  $_SESSION['username'];
$user=  $_SESSION['username'];
$g = "select * from post where username = '$username' ";

$r = mysqli_query($con,$g);
                  
if(mysqli_num_rows($r)>0){
    while($row = mysqli_fetch_assoc($r)){
          $token_id = $row['token_id'];
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