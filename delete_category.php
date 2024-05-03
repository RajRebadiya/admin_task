<?php
// Include database connection or any necessary files
include 'config.php';

// Check if category ID is provided
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Delete category from the database
    $sql = "DELETE FROM category WHERE c_id = $category_id";

    if (mysqli_query($con, $sql)) {
        // Category deleted successfully
        header("Location: category.php?delete_success=true");
        exit();
    } else {
        // Error deleting category
        echo "Error deleting category: " . mysqli_error($con);
    }
} else {
    // Category ID not provided
    echo "Category ID not provided.";
}
