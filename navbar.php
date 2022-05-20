<html>
<head>
<script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js"
        type="application/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<title>nav</title>
</head>
<body>
    



<nav>
       <img src="./assets/logo.png" alt="">


       <?php
   if(isset($_SESSION['username'])){
echo'
        <div class="searchbar">
            <input type="search" id="search" name="search"  placeholder="Search other artists">
            <h5><i class="uil uil-search"></i></h5>
            <div id="result"></div>
        </div>
       
        

        <div class="nav-links">
            <li><a href="./index.php">Home</a></li>
            <li><a href="./MyAccount.php">My Account</a></li>
            <li><a href="#">Collection</a></li>
            <li><a  href="./userGuide.html">User Guide</a></li>
            <!-- <li>About</li> -->
        </div>';
    }

        ?>





        <div class="nav-buttons">
          
            <?php
             if(isset($_SESSION['username'])){
            echo'<button id="acc">connect wallet</button>';

            echo'<li><a  class="btn" id="create-btn" href="./create.php">Create</a></li>' ; }
           ?>
            <!-- <input  type="button" value="Create"> -->

            

            <!-- <li><a  class="btn" id="signin-btn" href="./login.php"> -->
                
            <?php
            // session_start();
             if(isset($_SESSION['username'])){
                 echo "<a style='text-decoration:none; padding:0.4rem 1.2rem;font-size:0.9rem; border:1px solid #222;'  class='btn' id='signin-btn' href='./logout.php'>logout</a>";
             }else{
                echo "<a style='text-decoration:none; padding:0.4rem 1.2rem;font-size:0.9rem; border:1px solid #80f ;color:white;' class='btn'  href='./login.php'>login</a>";

             }
            ?>
        
        
                
          
        
        
            <!-- <input class="btn" id="signin-btn" type="button" value="Sign-in"> -->
        </div>
<style>

   
</style>
        <script>
        $(document).ready(function(){
            $('#search').keyup(function(){
                var query = $('#search').val();
console.log(query)
                if(query.length>0){
                    $.ajax({
                        url: "fetchUserSearch.php",
                        method: "POST",
                        data: {
                           search : 1,
                           q: query 
                        },
                        success:function(data){
                            $('#result').html(data);
                        },
                        dataType: "text"
                    });
                }
            });

            $(document).on('click', 'li', function(){

                var country = $(this).text();
                $('#searchBox').val(username);
                $('#result').html("");

            });

            $(document).click(function(){
                
                    $('#result').html("");
                
            })
        });

</script>


<!-- <script src="./scripts/wallet.js"></script> -->

</script>


     <script>
    var provider ;
    var signer;
    var account = 0;
   


var  init = async function(){
   
if(window.ethereum){
    provider = new ethers.providers.Web3Provider(window.ethereum)
console.log(provider);
     signer = provider.getSigner()
     console.log(signer);
     account = await signer.getAddress();
    // console.log(account+'acc')
    
   console.log(account);
   if(account){
       $('#acc').html(`${account.slice(0,5)+'. . . '+account.slice(account.length-5,account.length)}`);
   }
   

 

}};

$(document).on('click', '#acc', function(){
    console.log('faf ')
    init();
    send();

})

$(document).ready(function(){
    
})


// document.onload = function(){

//     if(localStorage.getItem('account')){
//     let account = localStorage.getItem('account');
//     // document.querySelector('.acc').innerText = account.slice(0,5)+" . . . "+account.slice(account.length-5,account.length-1);
//     console.log(account);

// }
// }


async function send(){
    await provider.send("eth_requestAccounts", []);
    signature = await signer.signMessage("Connect Metamask ? ");
    // account = signer.getAddress();
    if(account){
       $('#acc').html(`${account}`);
   }
    sessionStorage.setItem('account',account);
    let account = sessionStorage.getItem('account');
    console.log(account);


    
   
}

</script>




    </nav>
    </body>
    </html>