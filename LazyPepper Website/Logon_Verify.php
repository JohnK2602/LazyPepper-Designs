<?php

session_start();
    
// Include database connection file
include("dbconnection.php");

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $sql = "SELECT inventory.item_id, inventory.item_img, inventory.gallery_desc
        FROM inventory
        WHERE inventory.gallery_item = 1";

    // Execute the SQL query and store the results
    $results = mysqli_query($dbconnection, $sql);

    // If the query fails, display the error message
    if (!$results) {
        die("Query failed: " . mysqli_error($dbconnection));
    }
    
    $row = mysqli_fetch_assoc($results);

    $username = $row['email'];
    $password = $row['password'];

    // Check if the provided credentials are correct
    if ($_POST["username"] === $username && $_POST["password"] === $password) {
        // Authentication successful, create a session variable to store user's login status
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;

        // Redirect to the protected page
        header("location: Create_Item.php");
        exit;
    } else {
        // Authentication failed, redirect back to the login page with an error message
        header("location: Logon.html?error=invalid_credentials");
        exit;
    }
}

?>