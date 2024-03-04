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

function removeFromCart($itemId) {
    $index = array_search($itemId, $_SESSION['cart']);
    if ($index !== false) {
        array_splice($_SESSION['cart'], $index, 1);
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['remove_from_cart'])) {
    $selectedId = $_POST['selected_id'];
    removeFromCart($selectedId);
    header("Location: Buy_Page.php");
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
                        <a class="nav-link hov" href="Gallery_Page.php" tabindex="-1" aria-disabled="true">Gallery</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link active" aria-current="page" href="Buy_Page.php" tabindex="-1" aria-disabled="true">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-container" id="mainContainer">
        <div class="content" id="pageContent">

            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                $totalPrice = 0;
                foreach ($_SESSION['cart'] as $itemId) {
                    $sql = "SELECT inventory.item_img, inventory.price, inventory.item_type, inventory.length, inventory.width, inventory.height, inventory.wood_type
                            FROM inventory
                            WHERE inventory.item_id = ".$itemId.";";

                    // Execute the SQL query and store the results
                    $results = mysqli_query($dbconnection, $sql);

                    $item = mysqli_fetch_assoc($results);
                    $imageName = $item['item_img']; 

                    // If the query fails, display the error message
                    if (!$results) {
                        die("Query failed: " . mysqli_error($dbconnection));
                    } ?>

                    <div class="card-group shadow-lg mb-5">
                        <div class="card">
                            <div class="card-body text-center">
                                <?php echo "<img src='$imageName' class='card-img-top' alt='...' style='max-width: 400px; '>"; ?>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body align-content-center text-align-start">
                                <h2>
                                    <?php echo "Type: ",ucfirst($item['item_type']); ?>
                                </h2>
                                <p>
                                <?php echo "Length: ",$item['length'],"in."; ?>
                                <br>
                                <?php echo "Width: ",$item['width'],"in."; ?>
                                <br>
                                <?php echo "Height: ",$item['height'],"in.";?>
                                <br>
                                <?php echo "Wood Type: ",$item['wood_type']; ?>
                            </p>
                                <h1>
                                    <?php echo "$",$item['price']; ?>
                                </h1>
                                <div>
                                    <?php 
                                        if (isInCart($itemId)) {
                                            echo '<form action="" method="post">'; 
                                            echo '<input type="hidden" name="selected_id" value="' . $itemId . '">';
                                            echo '<button type="submit" name="remove_from_cart" class="remove-btn">Remove from Cart</button>'; 
                                            echo '</form>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $totalPrice = $item['price'] + $totalPrice; }

                
                $totalPrice = number_format($totalPrice, 2, ".", "");
                $shipping = number_format(5, 2, ".", "");
                $tax = number_format($totalPrice * 0.06, 2, ".", "");
                
                echo "<div class='d-grid gap-2 col-6 mx-auto'>";

                echo "<div class='d-flex mb-3'>";
                echo "<div class='p-2'>Price:</div>";
                echo "<div class='ms-auto p-2'>$$totalPrice</div>";
                echo "</div>";
                
                echo "<div class='d-flex mb-3'>";
                echo "<div class='p-2'>Shipping:</div>";
                echo "<div class='ms-auto p-2'>$$shipping</div>";
                echo "</div>";
                
                echo "<div class='d-flex mb-3'>";
                echo "<div class='p-2'>Tax:</div>";
                echo "<div class='ms-auto p-2'>$$tax</div>";
                echo "</div>";
                
                echo "</div>";

                $totalPrice = number_format($totalPrice + $tax + $shipping, 2, ".", "");

                echo "<div class='d-grid gap-2 col-6 mx-auto'>";
                echo "<button class='btn btn-primary' type='button'>Total Price: $". $totalPrice ."</button>";
                echo "</div>";
                // echo '<form action="" method="post">'; 
                // echo '<input type="hidden" name="selected_id" value="' . $itemId . '">';
                // echo '<button type="submit" name="buy_items" class="purchase-btn">Total Price: $'. $totalPrice .'</button>'; 
                // echo '</form>';
                } 

                else {
                    echo "There are no items in your cart!";
                }
            ?>
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