<?php
// Include database connection or any necessary files
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form is submitted with proper data
    if (isset($_POST['p_id']) && isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['product_sell_price']) && isset($_POST['product_qty'])) {
        // Retrieve form data
        $product_id = $_POST['p_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_sell_price = $_POST['product_sell_price'];
        $product_qty = $_POST['product_qty'];

        // Handle file upload if a new image is provided
        if ($_FILES['new_product_image']['name']) {
            // Handle file upload
            $image_name = $_FILES['new_product_image']['name'];
            $image_temp = $_FILES['new_product_image']['tmp_name'];
            $image_path = "uploads/product_images/" . $image_name;
            move_uploaded_file($image_temp, $image_path);
        }

        // Update product details in the database
        $sql = "UPDATE product SET p_name='$product_name', price='$product_price', sell_price='$product_sell_price', qty='$product_qty'";
        if (isset($image_path)) {
            // Update image path if a new image is provided
            $sql .= ", p_image='$image_path'";
        }
        $sql .= " WHERE p_id='$product_id'";

        if (mysqli_query($con, $sql)) {
            // Product updated successfully
            echo "Product updated successfully.";
            header("Location: product.php?update_success=true");
            exit();
            // Redirect to a success page or display a success message
        } else {
            echo "Error updating product: " . mysqli_error($con);
        }

        // Close connection
        mysqli_close($con);
    } else {
        // Required form data is missing
        echo "Please provide all required information.";
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}
