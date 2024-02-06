<?php

// Start a session
session_start();

// Include database connection file
include("dbconnection.php");

function isInCart($itemId) {
    return isset($_SESSION['cart']) && in_array($itemId, $_SESSION['cart']);
}

function addToCart($itemId) {
    $_SESSION['cart'][] = $itemId;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['add_to_cart'])) {
    $selectedId = $_POST['selected_id'];
    addToCart($selectedId);
    header("Location: Cutting_Page.php");
    exit();
}

function setCookieValue($name, $value, $expiry = 0) {
    setcookie($name, $value, $expiry, "/");
}

function getCookieValue($name) {
    return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
}

$cartCookie = getCookieValue('cart');
if ($cartCookie !== null) {
    $_SESSION['cart'] = json_decode($cartCookie, true);
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LazyPepper Designs</title>
    <link rel="stylesheet" href="Buy_Format.css">
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
                <a href="Cutting_Page.php">Cutting</a>
                <a href="Specialty_Page.php">Specialty</a>
                <a href="Custom_Page.html">Custom</a>
                <a href="Contact_Page.html">Contact</a>
                <a href="Gallery_Page.php">Gallery</a>
                <a href="Buy_Page.php" class="active">View Cart</a>
            </div>
        </div>
    </div>

    <div class="main-container" id="mainContainer">
        <div class="content" id="pageContent">

        <h2>Shopping Cart</h2>
        <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            echo '<ul>';
            $totalPrice = 0;
            foreach ($_SESSION['cart'] as $itemId) {
                $sql = "SELECT inventory.item_img, inventory.price
                        FROM inventory
                        WHERE inventory.item_id = ".$itemId.";";

                // Execute the SQL query and store the results
                $results = mysqli_query($dbconnection, $sql);

                $item = mysqli_fetch_assoc($results);
                $imageName = $item['item_img']; 

                // If the query fails, display the error message
                if (!$results) {
                    die("Query failed: " . mysqli_error($dbconnection));
                }
                echo '<li>';
                echo "<img src='$imageName' alt='Image' id='image' style='max-width: auto; max-height: 200px;'>";
                echo "      $",$item['price'];
                echo '</li>';

                $totalPrice = $item['price'] + $totalPrice;
            }
            echo "";
            echo "Total Price: $",$totalPrice;
            echo '</ul>';
        } else {
            echo '<p>Your cart is empty.</p>';
        }
        ?>

    <script>
        const currentCart = <?php echo json_encode($SESSION['cart'] ?? []); ?>;
    </script>
</body>

</html>