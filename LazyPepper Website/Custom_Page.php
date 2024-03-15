<?php
// Start a session
session_start();

// Include database connection file
include("dbconnection.php");
?>

<!DOCTYPE html>
<html lang="en">

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
                        <a class="nav-link active" aria-current="page" class="nav-link hov" href="Custom_Page.php" tabindex="-1" aria-disabled="true">Custom</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link hov " href="Contact_Page.html" tabindex="-1" aria-disabled="true">Contact</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link hov" href="Gallery_Page.php" tabindex="-1" aria-disabled="true">Gallery</a>
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
            <form class="row g-3" action="Custom_Email.php">
                <div class="col-md-6">
                    <label for="first" class="form-label">First name</label>
                    <input type="text" class="form-control" id="first" placeholder="John" required>
                </div>
                <div class="col-md-6">
                    <label for="last" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="last" placeholder="Smith" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>    
                    <input type="text" class="form-control" id="email" placeholder="john@email.com" required>
                </div>
                <div class="col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                </div>
                <div class="col-md-6">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" placeholder="Columbia" required>
                </div>
                <div class="col-md-2">
                    <label for="state" class="form-label">State</label>
                    <input type="text" class="form-control" id="state" placeholder="SC" required>
                </div>
                <div class="col-md-2">
                    <label for="zip" class="form-label">Zip</label>
                    <input type="text" class="form-control" id="zip" placeholder="12345" required>
                </div>
                <div class="mb-3">
                    <label for="order" class="form-label">Describe Your Order</label>
                    <textarea class="form-control" id="order" rows="3" required></textarea>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit Request</button>
                </div>
            </form>

            <!-- Put all other information Here!!! -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>