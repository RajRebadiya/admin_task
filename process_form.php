<?php
include 'config.php';
$alertMsg = '';
if (isset($_POST['submit'])) {
    // Retrieve form data
    $category_name = $_POST['c_name'];

    // Handle file upload
    $image_name = $_FILES['c_image']['name'];
    $image_temp = $_FILES['c_image']['tmp_name'];
    $image_path = "uploads/" . $image_name;
    move_uploaded_file($image_temp, $image_path);


    // Insert data into database
    $sql = "INSERT INTO category (c_name, c_image) VALUES ('$category_name', '$image_path')";

    if (mysqli_query($con, $sql)) {
        $alertMsg = '<div class="alert alert-success" id="alert" role="alert">
        Category added successfully
        </div>';
        // Redirect back to the page or show a success message
        header("Location: category.php?success=true");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // Close connection
    mysqli_close($con);
}
