<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post page</title>

</head>
<body>

<div class="back">
    <a href="index.php#head">back to home</a>
</div>
<?php
include 'db.php';
$token = $_GET['tokenID'];
$g = "select * from post where token_id = $token";
$res = mysqli_query($con,$g);

while($row = mysqli_fetch_assoc($res)){
// $q = "select address from user where username = '$row['username']';";
// $user_address = mysqli_query($con,$q);

?>




    <div class="contain">
        <div style='background-image:url("post/<?php echo $row['post_content']?>");' class="post-image">

        </div>
        <div class="details">
            <div class="post-title">
                <h3><?php echo $row['postname']?></h3>
                <h3>#<?php echo"$token"?></h3>

            </div>
           
            <div class="user-details">
                <h4>User:</h4>
                <h4 class="pd"><?php echo substr($row['username'],0,20)?></h4>
                <!-- <h4>Address :</h4> -->


                <!-- <h2 class="pd"><?php echo $user_address?></h2> -->
            </div>
            <h4 style="color:white;margin-top:1rem;">Description : </h4>
            <div class="post-desc">
                <p><?php echo $row['post_description']?></p>

            </div>
        
            
            <div class="purchase">
                <button>Buy</button>
            </div>
        </div>

    </div>
<?php

}

?>











<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'poppins';
    }
body{
box-sizing: border-box;
    margin:0;
    padding: 0;
    height: 100vh;
    width: 100vw;
    background-color: #000;

    display: flex;
        justify-content: space-around;
        align-items: center;


}
    .contain{
        /* background-color: aqua; */
        width: 80%;
        height: 100%;
        /* padding: 1rem;
        margin: 1rem; */
        display: flex;
        justify-content: space-around;
        align-items: center;



    }

    .post-image{
        height: 80%;
        width: 40vw;
        margin-right: 1rem;
        border-radius: 20px;
        background-size: cover;
        background-position: center;
    }

    .details{
        width: 40vw;
        height: 80%;
        background: #111;

        border-radius: 20px;
        padding: 1rem;
position: relative;
       
    }

    h3{
        color: white;
        font-size: 2rem;
    }
    h2{

        color: white;
        font-size: 1rem;
        font-weight: 400;


    }

.post-title{
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.pd{
    background-color: #000;
    border-radius: 1rem;
    padding: 1rem;
}
.post-desc{
    color:white;
    font-weight: 300;
    margin-top: 1rem;
    font-size: 0.8rem;
    padding: 1rem;
    background-color: #000;
    border-radius: 1rem;
    letter-spacing: 0.5px;
}
h4,h3,h2{
    margin-top: 0.5rem;
}
.user-details{
    color:white;
}

button{
    position: absolute;
    bottom: 1rem;
    border: none;
    outline: none;
    
    width: 95%;
    color: white;
    font-size: medium;
    padding: 1rem;
    border-radius: 20px;
    transition: 1s;
    cursor:pointer;
    background-image: linear-gradient(to left,rgb(0, 106, 255) , rgb(186, 0, 186));
}
button:hover{
    transform: scale(1.02);
    
}
.back{
    position: absolute;
    bottom:0;
    left:50%;
    padding:0.5rem 1rem;
    /* border-radius:1rem; */
    background:#111;
    text-align:center;
    transform:translateX(-50%);
    width:100%;
}
.back a{
    font-size:1rem;
    font-weight:400;
    color:white;
    text-decoration:none;

}
.back:hover{
    background:#000;
}
.back a:hover{
    color:blue;
}



</style>


</body>
</html>