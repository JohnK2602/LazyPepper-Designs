<?php
// next_page.php

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the selected ID from the form
    $selectedId = $_POST["selected_id"];

    // Perform any additional actions based on the selected ID
    // ...

    // Redirect to the new page or perform further processing
    header("Location: Buy_Page.php?id=" . $selectedId);
    exit();
} else {
    // Handle the case where the form was not submitted
    // ...
}
?>