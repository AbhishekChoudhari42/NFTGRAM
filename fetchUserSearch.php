<?php
// Build up DB connection including cofiguration file
require ("db.php");

if(isset($_POST['search'])){
    // Assign the fetched Profile to a variable and within the HTML tags with Boottrap class; list-group-item
    $response = "<ul class='list-group'><li class='list-group-item'>No User found</li></ul>";

    $q = mysqli_real_escape_string($con,$_POST["q"]);
    // mysql query to fetch the username
    $query = "SELECT * FROM  user  WHERE username LIKE '$q%'"; 
    // execution of the query. Output a boolean value
    $res = mysqli_query($con, $query);
    // Check if there are results matched
    if(mysqli_num_rows($res)>0){
        // Start the styling for fetch Profile list
        $response = "<ul class='list-group'>";
        // Display fetched all username matched with the entered phrase
        while($row = mysqli_fetch_assoc($res)){
            // Concatenate the results to the previously started list
            $response .= "<li style='height: 60px;' class='list-group-item'><a href='userPage.php?username=".$row['username']."'>".$row['username']."</a></li>";
        }
        // End the styling for fetch Profile list
        $response .= "</ul>";

    }
    // Close results
    exit($response);


}

?>
