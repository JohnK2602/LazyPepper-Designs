<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // User is not logged in, redirect to the login page
    header("location: logon_Page.html");
    exit;
}

// Include database connection file
include("dbconnection.php");

// Select data from tables animal and owner
$sql = "SELECT inventory.item_id, inventory.item_img, inventory.gallery_desc
            FROM inventory
            WHERE inventory.gallery_item = 1";

// Execute the SQL query and store the results
$results = mysqli_query($dbconnection, $sql);

// If the query fails, display the error message
if (!$results) {
    die("Query failed: " . mysqli_error($dbconnection));
}

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LazyPepper Designs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="About_Format.css">
    <link rel="stylesheet" href="Buy_Format.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="LazyPepper_Scripts.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light b-bottom">
        <div class="container-fluid">
            <header id="header-logo" class="header-logo">
                <img src="LazyPepperLogo.jpg" alt="Logo" class="header-logo">
            </header>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ps-3 ">
                    <li class="nav-item me-4">
                        <a class="nav-link hov" href="Create_Item.php">Create</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link hov" href="View_Charcuterie.php">Charcuterie</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link hov" href="View_Cutting.php">Cutting</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link hov" href="View_Specialty.php" tabindex="-1" aria-disabled="true">Specialty</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link active" aria-current="page" href="View_Gallery.php" tabindex="-1" aria-disabled="true">Gallery</a>
                    </li>
                    <a href="Logout.php">Logout</a>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-container" id="mainContainer">
        <div class="content" id="pageContent">
            <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                <div class="card-group shadow-lg mb-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['item_img']); ?>" class='card-img-top' alt='...' style='max-width: 400px' />
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body align-content-center text-align-start">
                            <p>
                                <?php echo $row['gallery_desc']; ?>
                            </p>
                            <div>
                                <?php
                                    echo '<form action="remove_item_id.php" method="post">'; 
                                    echo '<input type="hidden" name="selected_id" value="' . $row['item_id'] . '">';
                                    echo '<button type="submit" class="remove-btn">Remove</button>'; 
                                    echo '</form>'; 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
            <!-- Put all other information Here!!! -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>