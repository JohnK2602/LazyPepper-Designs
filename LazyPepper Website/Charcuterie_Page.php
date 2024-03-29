<?php

// Start a session
session_start();

// Include database connection file
include("dbconnection.php");

// Select data from tables animal and owner
$sql = "SELECT inventory.item_id, inventory.item_img, inventory.length, inventory.width, inventory.wood_type, inventory.price, inventory.item_type
            FROM inventory
            WHERE inventory.item_type = 'charcuterie'";

// Execute the SQL query and store the results
$results = mysqli_query($dbconnection, $sql);

// If the query fails, display the error message
if (!$results) {
    die("Query failed: " . mysqli_error($dbconnection));
}

function isInCart($itemId) {
    return isset($_SESSION['cart']) && in_array($itemId, $_SESSION['cart']);
}

function addToCart($itemId) {
    $_SESSION['cart'][] = $itemId;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['add_to_cart'])) {
    $selectedId = $_POST['selected_id'];
    addToCart($selectedId);
    header("Location: Charcuterie_Page.php");
    exit();
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
    header("Location: Charcuterie_Page.php");
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
                        <a class="nav-link active" aria-current="page" href="Charcuterie_Page.php">Charcuterie</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link hov" href="Cutting_Page.php">Cutting</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link hov" href="Specialty_Page.php" tabindex="-1" aria-disabled="true">Specialty</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link hov" href="Custom_Page.php" tabindex="-1" aria-disabled="true">Custom</a>
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

            <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                <div class="card-group shadow-lg mb-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($row['item_img']); ?>" class='card-img-top' alt='...' style='max-width: 400px' />
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body align-content-center text-align-start">
                            <h2>
                            <?php echo ucfirst($row['item_type']); ?>
                            </h2>
                            <p>
                                <?php echo "Length: ",$row['length'],"in."; ?>
                                <br>
                                <?php echo "Height: ",$row['width'],"in."; ?>
                                <br>
                                <?php echo "Wood Type: ",$row['wood_type']; ?>
                            </p>
                            <h1>
                                <?php echo "$",$row['price']; ?>
                            </h1>
                            <div>
                                <?php 
                                    if (isInCart($row['item_id'])) {
                                        echo '<form action="" method="post">'; 
                                        echo '<input type="hidden" name="selected_id" value="' . $row['item_id'] . '">';
                                        echo '<button type="submit" name="remove_from_cart" class="remove-btn">Remove from Cart</button>'; 
                                        echo '</form>';
                                    }
                                    else {
                                        echo '<form action="" method="post">'; 
                                        echo '<input type="hidden" name="selected_id" value="' . $row['item_id'] . '">';
                                        echo '<button type="submit" name="add_to_cart" class="buy-btn">Add to Cart</button>'; 
                                        echo '</form>'; 
                                    } 
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

    <script>
        const currentCart = <?php echo json_encode($SESSION['cart'] ?? []); ?>;
    </script>
</body>

</html>