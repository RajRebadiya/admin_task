<?php
// Include database connection or any necessary files

// Check if form is submitted
include "config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if category ID is provided
    if (isset($_POST['category_id'])) {
        // Retrieve category ID from form
        $category_id = $_POST['category_id'];

        // Sanitize and validate form input
        $category_name = $_POST['category_name']; // You may want to add more validation here

        // Check if a new image file is uploaded
        if ($_FILES['new_category_image']['error'] === UPLOAD_ERR_OK) {
            // File upload was successful
            $new_image_temp = $_FILES['new_category_image']['tmp_name'];
            $new_image_name = $_FILES['new_category_image']['name'];
            $new_image_path = "uploads/" . $new_image_name;

            // Move uploaded image to the desired directory
            if (move_uploaded_file($new_image_temp, $new_image_path)) {
                // Update category information in the database including the new image
                $sql = "UPDATE category SET c_name = '$category_name', c_image = '$new_image_path' WHERE c_id = $category_id";

                if (mysqli_query($con, $sql)) {
                    // Category information updated successfully
                    header("Location: category.php?update_success=true");
                    exit();
                } else {
                    // Error updating category information
                    echo "Error updating category: " . mysqli_error($con);
                }
            } else {
                // Error moving uploaded image
                echo "Error uploading image.";
            }
        } else {
            // No new image file uploaded, update only text information
            $sql = "UPDATE category SET c_name = '$category_name' WHERE c_id = $category_id";

            if (mysqli_query($con, $sql)) {
                // Category information updated successfully
                header("Location: category.php?update_success=true");
                exit();
            } else {
                // Error updating category information
                echo "Error updating category: " . mysqli_error($con);
            }
        }
    } else {
        // Category ID not provided
        echo "Category ID not provided.";
    }
} else {
    // Redirect user if they try to access this page directly
    header("Location: category.php");
    exit();
}
