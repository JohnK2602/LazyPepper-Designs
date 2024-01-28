!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LazyPepper Designs</title>
    <link rel="stylesheet" href="About_Format.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="LazyPepper_Scripts.js"></script>
</head>

<body>
    <?php
    // Check if the 'id' parameter is set in the URL
    if (isset($_GET['id'])) {
        // Retrieve the selected ID from the URL
        $selectedId = $_GET['id'];

        // Display the selected ID
        echo '<h1>Details for ID: ' . $selectedId . '</h1>';

        // Perform additional actions based on the selected ID
        // ...

    } else {
        // Handle the case where the 'id' parameter is not set
        echo '<p>No ID selected.</p>';
    }
    ?>
</body>

</html>