<?php
include 'config.php';

// Check if category_id is provided via GET request
if (isset($_GET['category_id'])) {
    $id = $_GET['category_id'];
    $sql = "SELECT * FROM category WHERE c_id = $id";
    $result = mysqli_query($con, $sql);

    // Check if there's exactly one row returned
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Encode the row data as JSON
        echo json_encode($row);
    } else {
        // Handle case when category is not found
        echo json_encode(["error" => "Category not found"]);
    }
} else {
    // Handle case when category_id is not provided
    echo json_encode(["error" => "Category ID not provided"]);
}
