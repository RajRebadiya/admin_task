<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        img {
            margin-top: 10px;
            display: block;
            max-width: 100%;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include 'config.php';
        if (isset($_GET['id'])) {
            $category_id = $_GET['id'];
            $sql = "SELECT * FROM category WHERE c_id = $category_id";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $category_name = $row['c_name'];
                $category_image = $row['c_image'];
                $image_path = $category_image;
        ?>
                <form action="update_category.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
                    <div class="form-group">
                        <label for="category_name">Category Name:</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $category_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="category_image">Current Category Image:</label><br>
                        <img src="<?php echo $image_path; ?>" alt="Category Image">
                        <br>
                        <label for="new_category_image">New Category Image:</label>
                        <input type="file" class="form-control" id="new_category_image" name="new_category_image">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </form>
        <?php
            } else {
                echo "Category not found.";
            }
        } else {
            echo "Category ID not provided.";
        }
        ?>
    </div>
</body>

</html>