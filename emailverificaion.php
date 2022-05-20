<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Email Verification</title>
    <link rel="stylesheet" href="./main.css"/>
    <?php include 'css/style.php'?>
    <?php include 'links/links.php'?>
</head>
<body>
<?php
    include 'dbcon.php';
 
    if (isset($_POST['submit'])) {
      
        $username = $_POST['username'];
       
        $username = mysqli_real_escape_string($con, $username);

        $email    = $_POST['email'];

        $email    = mysqli_real_escape_string($con, $email);

        $password = $_POST['password'];

        $password = mysqli_real_escape_string($con, $password);

        // $create_datetime = date("Y-m-d H:i:s");

        $emailquery = " select * from registration email='$email'";

        $query = mysqli_query($con,$emailquery);

        $emailcount = mysqli num rows($query);

        if($emailcount>0){
            echo "email already exists";
        }else{
            echo "no";
        }
        $uid = rand(0,292343);
        $login = rand(0,29233);

        $query    = "insert into user (username,u_id,email,login_status,password)
                     values('$username','$uid', '$email', '$login','$password')";
             

        $result   = mysqli_query($con, $query);



        // echo "$result";
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
    } else {
?>
    <form class="form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>