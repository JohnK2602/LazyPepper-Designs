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
                        <a class="nav-link active" aria-current="page" href="Create_Item.php">Create</a>
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
                        <a class="nav-link hov" href="View_Gallery.php" tabindex="-1" aria-disabled="true">Gallery</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-container" id="mainContainer">
        <div class="content" id="pageContent">
            <form action="Table_Insert.php" method="POST" class="row g-3">
                <div class="col-md-6">
                    Gallery Item: <select name="gallery_item"> 
                        <option value=1> Yes</option>
                        <option value=0> No</option></select>
                </div>
                <div class="col-12">
                    Gallery Description: <input class="form-control" id="exampleFormControlTextarea1" rows="3" type="text" name="gallery_desc" value="N/A">
                </div>
                <div class="col-12">
                    Image: <input class="form-control" type="file" id="formFile" name="item_img"><br>
                </div>
                <div class="col-12">
                    Item Type: <select name="item_type"> 
                        <option value="none"> None</option>
                        <option value="cutting"> Cutting</option>
                        <option value="charcuterie"> Charcuterie</option>
                        <option value="specialty"> Specialty</option></select><br>
                </div>
                <div class="col-sm">
                    Height (inches): <input type="number" name="height" value=0><br>
                </div>
                <div class="col-sm">
                    Length (inches): <input type="number" name="length" value=0><br>
                </div> 
                <div class="col-sm">
                    Width (inches): <input type="number" name="width" value=0><br>
                </div>
                <div class="col-sm">
                    Wood: <input type="text" name="wood_type" value="N/A"><br>
                </div>
                <div class="col-sm">
                    Price: <input type="number" name="price" value=0><br>
                </div>
                <div class="col-12">
                    <input type="submit" name="submit">
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