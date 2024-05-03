<?php
include 'config.php';
$alertMsg = '';
if (isset($_POST['submit'])) {
    // Retrieve form data
    $product_name = $_POST['p_name'];
    $category_id = $_POST['catogory']; // Retrieve category ID from the form
    $product_price = $_POST['price'];
    $product_sell_price = $_POST['sell_price'];
    $product_qty = $_POST['qty'];

    // Handle file upload
    $image_name = $_FILES['p_image']['name'];
    $image_temp = $_FILES['p_image']['tmp_name'];
    $image_path = "uploads/product_images/" . $image_name;
    move_uploaded_file($image_temp, $image_path);

    // Insert data into database
    $sql = "INSERT INTO product (p_name, c_id, p_image, price, sell_price, qty) VALUES ('$product_name', '$category_id', '$image_path', '$product_price', '$product_sell_price', '$product_qty')";

    if (mysqli_query($con, $sql)) {
        $alertMsg = '<div class="alert alert-success" id="alert" role="alert">
        Product added successfully
        </div>';
        // Redirect back to the page or show a success message
        header("Location: product.php?success=true");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // Close connection
    mysqli_close($con);
}
