<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="./main.css"/>
</head>
<body>
<?php

function reg(){
    echo "<div class='form'>
    <h3>Please fill the form again</h3><br/>
    <p class='link'>Click here to <a href='registration.php'>Register</a></p>
    </div>";
}


    require('db.php');
    $flag = 0;
    if (isset($_POST['submit'])) {
        
        $username = $_POST['username'];
            echo"$username";
        $email    = $_POST['email'];
        $address    = $_POST['address'];

        $password = $_POST['password'];
        
        $password2 = $_POST['password2'];

       
        $checkUser = mysqli_query($con, "select * from user where username = '$username'");
        $checkEmail = mysqli_query($con, "select * from user where email = '$email'");
        $checkAddress = mysqli_query($con, "select * from user where email = '$address'");
       


        if(mysqli_num_rows($checkUser)>0){
            
            $flag = 1; 
            ?>

            <script>
                alert("user already exists");
            </script>
            
            <?php

            reg();
        }else if(mysqli_num_rows($checkEmail)>0){
            $flag = 1;
            ?>
            <script>
                alert("Email already exists");
            </script>
            
            <?php
            reg();
        }
        else if(mysqli_num_rows($checkAddress)>0){
            $flag = 1;
            ?>
            <script>
                alert("Wallet Address already exists");
            </script>
            
            <?php
            reg();
        }else if($password != $password){
            $flag = 1;
            ?>
            <script>
                alert("Please enter same password in both the fields");
            </script>
            
            <?php
            reg();
        }else{

        $query    = "insert into user (username,email,address,password)
                     values('$username','$email','$address','$password');";
             
    

        $result   = mysqli_query($con, $query);

       
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";


        } else {
            echo "<div class='form'>

                
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }

       

    }
    }else{

  
    
    echo"<form class='form' action='' method='POST'>
        <h1 class='login-title'>Registration</h1>
        <input type='text' class='login-input' name='username' placeholder='Username' required />
        <input type='email' class='login-input' name='email' placeholder='Email Address' required>
        <input type='text' class='login-input' name='address' placeholder='Wallet Address' required />

        <input type='password' class='login-input' name='password' placeholder='Password' required>
        <input type='password' class='login-input' name='password2' placeholder='Confirm Password' required>
        <input type='submit' name='submit' value='Register' class='login-button'>
        <p class='link'><a href='login.php'>Click to Login</a></p>
    </form>";  }
    ?>
</body>
</html>