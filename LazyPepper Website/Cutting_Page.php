<?php

// Start a session
session_start();

// Include database connection file
include("dbconnection.php");

// Select data from tables animal and owner
$sql = "SELECT inventory.item_id, inventory.item_img, inventory.length, inventory.width, inventory.wood_type, inventory.price
            FROM inventory
            WHERE inventory.item_type = 'cutting'";

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
    <link rel="stylesheet" href="Cutting_Format.css">
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
                <a href="About_Page.html">About</a>
                <a href="Charcuterie_Page.php">Charcuterie</a>
                <a href="Cutting_Page.php" class="active">Cutting</a>
                <a href="Specialty_Page.php">Specialty</a>
                <a href="Custom_Page.html">Custom</a>
                <a href="Contact_Page.html">Contact</a>
                <a href="Gallery_Page.php">Gallery</a>
            </div>
        </div>
    </div>

    <div class="main-container" id="mainContainer">
        <div class="content" id="pageContent">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Length</th>
                        <th>Width</th>
                        <th>Wood Type</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                        <tr>
                            <td>
                                <?php $imageName = $row['item_img']; echo "<img src='$imageName' alt='Image' id='image' style='max-width: 300px; max-height: auto;'>"; ?>
                            </td>
                            <td>
                                <?php echo $row['length'],"in."; ?>
                            </td>
                            <td>
                                <?php echo $row['width'],"in."; ?>
                            </td>
                            <td>
                                <?php echo $row['wood_type']; ?>
                            </td>
                            <td>
                                <?php echo '<form action="save_item_id.php" method="post">'; 
                                echo '<input type="hidden" name="selected_id" value="' . $row['item_id'] . '">';
                                echo '<button type="submit">Buy</button>'; 
                                echo '</form>'; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Put all other information Here!!! -->
        </div>
    </div>
</body>

</html>