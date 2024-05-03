<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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
            $product_id = $_GET['id'];
            $sql = "SELECT * FROM product WHERE p_id = $product_id";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $product_name = $row['p_name'];
                $product_image = $row['p_image'];
                $image_path = $product_image;
                $product_price = $row['price'];
                $product_sell_price = $row['sell_price'];
                $product_qty = $row['qty'];
        ?>
                <form action="update_product.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="p_id" value="<?php echo $product_id; ?>">
                    <div class="form-group">
                        <label for="product_name">Product Name:</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="product_image">Current Product Image:</label><br>
                        <img src="<?php echo $image_path; ?>" alt="Product Image">
                        <br>
                        <label for="new_product_image">New Product Image:</label>
                        <input type="file" class="form-control" id="new_product_image" name="new_product_image">
                    </div>
                    <div class="form-group">
                        <label for="product_price">Product Price:</label>
                        <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $product_price; ?>">
                    </div>
                    <div class="form-group">
                        <label for="product_sell_price">Product Selling Price:</label>
                        <input type="text" class="form-control" id="product_sell_price" name="product_sell_price" value="<?php echo $product_sell_price; ?>">
                    </div>
                    <div class="form-group">
                        <label for="product_qty">Product Quantity:</label>
                        <input type="text" class="form-control" id="product_qty" name="product_qty" value="<?php echo $product_qty; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
        <?php
            } else {
                echo "Product not found.";
            }
        } else {
            echo "Product ID not provided.";
        }
        ?>
    </div>
</body>

</html>