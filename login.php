<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="./main.css"/> 
</head>
<body>
<?php

    require('db.php');

    session_start();
    if (isset($_POST['username'])) {
        $username = stripslashes($_POST['username']);    
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query    = "SELECT * FROM `user` WHERE username='$username'
                     AND password = '$password'";


        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);


        if ($rows == 1) {
            $email = mysqli_query($con,"select email from user where username = '$username';");
            $_SESSION['username'] = $username;
            // $_SESSION['email'] ="$email";
            // $_SESSION['password'] = $password;
            header("location: index.php");

        } 
        else {

            echo "<div class='form'>
                  <h3 style='color:white;'>Incorrect Username/password.</h3><br/>
                  <p style='color:white;' class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
            }

        } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <!-- <p style = "color:white; text-align:center;">Dont have an account ?</p> -->
        <p class="link"> Dont have an account ? <a href="registration.php">register here</a></p>
  </form>
<?php
    }
?>
</body>
</html>