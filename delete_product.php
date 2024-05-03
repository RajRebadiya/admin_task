<?php
// Include database connection or any necessary files
include 'config.php';

// Check if product ID is provided
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Delete product from the database
    $sql = "DELETE FROM product WHERE p_id = $product_id";

    if (mysqli_query($con, $sql)) {
        // product deleted successfully
        header("Location: product.php?delete_success=true");
        exit();
    } else {
        // Error deleting product
        echo "Error deleting product " . mysqli_error($con);
    }
} else {
    // product ID not provided
    echo "product ID not provided.";
}
