<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/create.css">
    <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js"
        type="application/javascript"></script>
</head>
<body>

 <!-- ================================================= -->
 <nav>
       <img src="./assets/logo.png" alt="">
        <div class="nav-links">
            <li><a href="./index.php">Home</a></li>
            <li><a href="./MyAccount.php">My Account</a></li>
            <li><a href="#">Collection</a></li>
            <li><a  href="#">User Guide</a></li>
        </div></div>
    </nav>
 <?php

include 'db.php';


 
 ?>
 <!-- ================================================= -->

     <div class="title-box">
        <h2 class="title">Create Post</h2>
     </div>
    

<!-- ==================================== form start ======================================= -->
     <form id="upload" action="" style="display:flex; " class="container" method = "POST" enctype = "multipart/form-data" >
        
     
     <div class="img-area">

        <div class="drag-area">
            
            <div class="icon"><i class="uil uil-image-plus"></i></div>
                    <!-- <header>Drag & Drop to Upload File</header> -->
                    <!-- <span>OR</span> -->
                    <button hidden>Browse File</button>
                
                <!-- file input -->
          
          
          
                </div>
                <input style='color:white;border:1px solid #777;' type="file" name="file" id="file">


        </div>



          <script src="./scripts/drag.js"></script>



        <div class="text-area">
                <div class="desc">
                    <!-- postname -->
                    <input id="postname" name="postname" placeholder="Post Name" type="text" required>
                    <!-- desc -->
                    
                    <textarea id = "desc" name = "desc" placeholder="Write Description . . ." name="" id="" cols="30" rows="10" required></textarea>
                    <!-- price -->
                    
                    <input id = "price" name = "price" placeholder="Price in ETH" type="text" required>

                    <input id = "tokenID" name = "tokenID"   hidden>

                </div>

            <div class="create">
            
                <input id = "upload" type="submit" name="submit" value="CREATE" class="btn btn-danger">
                <input id="cancel-it" type = "button" style="width:100px;float:right;background:red;color:white;"  value="CANCEL" class="btn">
            
            </div>
            <script>
                const cancel = document.querySelector("#cancel-it").addEventListener('click',function(){
                        window.location.reload();
                        })

            </script>
       
       
       
       
       
       
       
        </div>
   
</form>

<div id= 'pre'></div>
<!-- ==================================== form end ======================================= -->

<!-- script for minting  -->
<script src="scripts/mint.js"></script>

<script>
// ab();
$(document).ready(function(){
    $("#upload").on("submit",function(e){
        e.preventDefault();
let desc = $('#desc').val()
let price = $('#price').val()
let postname = $('#postname').val()
       
            

       


        var formData = new FormData(this);

        console.log(formData);
        var file = $('#file').prop('files')[0];
        formData.append('file',file);
        // formData.append('price',price);

        console.log(file);


        if(file && desc && price && postname){
           mintNFT('0xe9bA8429425f0AFD8bfc3380F0EFe9d981026026',desc,price,formData)
            
        //    $('#tokenID').val(tokenID);



        //     $.ajax({
        //     url :"sendPostData.php",
        //     type : 'POST',
        //     data : formData,
        //     dataType:'text',
        //     cache : false,
        //     processData:false,
        //     contentType:false,
        //     success : function(data){
        //         console.log(data);
        //         $('#file').val('');
        //         $('#pre').html(data);
        //         var dropArea = document.querySelector(".drag-area")
        //         alert("db updatef")
        //         dropArea.classList.remove("active");


        //     }
        // })

        }else{
            alert("Please Enter all the details");
        }


       
    })
})

</script>

















</body>
</html>