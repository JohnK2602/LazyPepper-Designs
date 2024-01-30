<?php
// Include database connection file
include("dbconnection.php");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the selected ID from the form
    $selectedId = $_POST["selected_id"];

    $result=mysqli_query($dbconnection, "DELETE FROM inventory WHERE item_id=$selectedId");

    
} else {
    // Handle the case where the form was not submitted
    // ...
}
?>