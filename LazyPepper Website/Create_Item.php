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
    <link rel="stylesheet" href="About_Format.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="LazyPepper_Scripts.js"></script>
</head>

<body>

    <div class="red-column" id="fullMenu">
        <div id="inner-nav">
            <header id="header-logo" class="header-logo">
                <img src="LazyPepperLogo.jpg" alt="Logo" class="header-logo">
            </header>
            <button id="hamburger-button" class="hamburger">
                <div class="hamburger-line"></div>
                <div class="hamburger-line"></div>
                <div class="hamburger-line"></div>
            </button>

            <div id="menu">

                <!-- Change class="" to the currentlly opened page-->
                <a href="Create_Item.php" class="active">Create Item</a>
                <a href="View_Charcuterie.php">View Charcuterie</a>
                <a href="View_Cutting.php">View Cutting</a>
                <a href="View_Specialty.php">View Specialty</a>
            </div>
        </div>
    </div>

    <div class="main-container" id="mainContainer">


        <div class="content" id="pageContent">
            <form action="Table_Insert.php" method="POST">

                Gallery Description: <input type="text" name="gallery_desc"><br><br>
                Gallery Item? <input type="checkbox" name="gallery_item" value="1"><br><br>
                Image: <input type="text" name="item_img"><br><br>
                Item Type: <select name="item_type"> 
                    <option value="cutting"> Cutting</option>
                    <option value="charcuterie"> Charcuterie</option>
                    <option value="specialty"> Specialty</option></select><br><br>
                Height (inches): <input type="number" name="height"><br><br>
                Length (inches): <input type="number" name="length"><br><br>
                Width (inches): <input type="number" name="width"><br><br>
                Wood: <input type="text" name="wood_type"><br><br>
                Price: <input type="number" name="price"><br><br>
                <input type="submit" name="submit">

            </form>

            <!-- Put all other information Here!!! -->
        </div>
    </div>
</body>

</html>