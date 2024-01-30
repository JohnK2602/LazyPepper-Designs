<?php
    // Include database connection file
    include("dbconnection.php");

    if(isset($_POST['submit'])) {

    $gallery_desc=$_POST['gallery_desc'];
    $gallery_item=$_POST['gallery_item'];
    $item_img=$_POST['item_img'];
    $item_type=$_POST['item_type'];
    $height=$_POST['height'];
    $length=$_POST['length'];
    $width=$_POST['width'];
    $wood_type=$_POST['wood_type'];
    $price=$_POST['price'];

    $result=mysqli_query($dbconnection, "INSERT INTO inventory VALUES (NULL,'$gallery_desc','$gallery_item','$height','$item_img','$item_type','$length','$price','$width','$wood_type')");

    if($result) {
        echo "Success";
    }
    else {
        echo "Failed";
    }

}
?>