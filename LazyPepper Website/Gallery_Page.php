<?php

// Start a session
session_start();

// Include database connection file
include("dbconnection.php");

// Select data from tables animal and owner
$sql = "SELECT inventory.item_img, inventory.gallery_desc
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
                        <a class="nav-link hov" href="About_Page.html">About</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link hov" href="Charcuterie_Page.php">Charcuterie</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link hov" href="Cutting_Page.php">Cutting</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link hov" href="Specialty_Page.php" tabindex="-1" aria-disabled="true">Specialty</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link hov" href="Custom_Page.html" tabindex="-1" aria-disabled="true">Custom</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link hov " href="Contact_Page.html" tabindex="-1" aria-disabled="true">Contact</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link active" aria-current="page" href="Gallery_Page.php" tabindex="-1" aria-disabled="true">Gallery</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link hov" href="Buy_Page.php" tabindex="-1" aria-disabled="true">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-container" id="mainContainer">
        <div class="content" id="pageContent">
            <div class="carousel slide" id="galleryCarousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="About_Page_Banner.jpg" class='d-block w-100'>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>
                                Pig Pickin' 2022
                            </h5>
                        </div>
                    </div>
                    <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                    <div class="carousel-item">
                        <img <?php $imageName = $row['item_img']; echo "<img src='$imageName' class='d-block w-100 h-100'"; ?>>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>
                                <?php echo $row['gallery_desc']; ?>
                            </h5>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- Put all other information Here!!! -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

    <script>
        const currentCart = <?php echo json_encode($SESSION['cart'] ?? []); ?>;
    </script>
</body>

</html>