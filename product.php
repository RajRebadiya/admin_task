<?php
include 'config.php';
session_start();
$alertMsg = '';

if (isset($_POST['submit'])) {


    $sql = "SELECT * FROM product";

    $result = mysqli_query($con, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preadmin.dreamstechnologies.com/html/school/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Apr 2024 10:38:14 GMT -->

<head>
    <meta charset="utf-8">
    <title>Preschool - Bootstrap Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/js/dataTables.js">
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.7.1.js">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css" />

    <style type="text/css">
        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek-ext/300/normal.woff2);
            unicode-range: U+1F00-1FFF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin/300/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin-ext/300/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/vietnamese/300/normal.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic/300/normal.woff2);
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic-ext/300/normal.woff2);
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek/300/normal.woff2);
            unicode-range: U+0370-03FF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 400;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/vietnamese/400/normal.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 400;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic/400/normal.woff2);
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 400;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic-ext/400/normal.woff2);
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 400;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin-ext/400/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 400;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek/400/normal.woff2);
            unicode-range: U+0370-03FF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 400;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin/400/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 400;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek-ext/400/normal.woff2);
            unicode-range: U+1F00-1FFF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek-ext/500/normal.woff2);
            unicode-range: U+1F00-1FFF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic-ext/500/normal.woff2);
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin/500/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/vietnamese/500/normal.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin-ext/500/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic/500/normal.woff2);
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek/500/normal.woff2);
            unicode-range: U+0370-03FF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 700;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic/700/normal.woff2);
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 700;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic-ext/700/normal.woff2);
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 700;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek/700/normal.woff2);
            unicode-range: U+0370-03FF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 700;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin/700/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 700;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin-ext/700/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 700;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek-ext/700/normal.woff2);
            unicode-range: U+1F00-1FFF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 700;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/vietnamese/700/normal.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 900;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin-ext/900/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 900;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek/900/normal.woff2);
            unicode-range: U+0370-03FF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 900;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/greek-ext/900/normal.woff2);
            unicode-range: U+1F00-1FFF;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 900;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic/900/normal.woff2);
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 900;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/vietnamese/900/normal.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 900;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/cyrillic-ext/900/normal.woff2);
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            font-display: swap;
        }

        @font-face {
            font-family: Roboto;
            font-style: normal;
            font-weight: 900;
            src: url(https://preadmin.dreamstechnologies.com/cf-fonts/s/roboto/5.0.11/latin/900/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }
    </style>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- <script>
        new DataTable('#example');
    </script> -->

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <div class="main-wrapper">

        <?php include 'include/sidebar.php';
        ?>
        <?php include 'include/header.php';
        ?>
    </div>
    </div>
    </div>

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <h5 class="text-uppercase mb-0 mt-0 page-title">Products</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <ul class="breadcrumb float-right p-0 mb-0">
                            <li class="breadcrumb-item"><a href="indeX-2.html"><i class="fas fa-home"></i> Home</a></li>
                            <!-- <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
                            <li class="breadcrumb-item"><span>Products</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="content container-fluid">
            <?php echo $alertMsg; ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <div class="page-title">Products</div>
                                </div>
                                <div class="col-sm-6 text-sm-right">
                                    <div class="mt-sm-0 mt-2">
                                        <button class="btn btn-outline-primary mr-2" onclick="showAddModal()">
                                            <span class="ml-2">Add</span>
                                        </button>
                                        <button class="btn btn-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>

                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table custom-table">
                                    <thead class="thead-light">
                                        <tr>

                                            <th>Product_id</th>
                                            <th>Category Name</th>
                                            <th>Product Name</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Selling Price</th>
                                            <th>Quantity</th>
                                            <th class="text-right ml-5">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT p.*, c.c_name 
                                        FROM product p 
                                        INNER JOIN category c ON p.c_id = c.c_id";
                                        $result = mysqli_query($con, $sql);
                                        if (!$result) {
                                            // Query execution failed
                                            die('Error: ' . mysqli_error($con));
                                        }

                                        $counter = 1;

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $counter; ?></td>
                                                    <td><?php echo $row['c_name']; ?></td>

                                                    <td><?php echo $row['p_name']; ?></td>
                                                    <td>
                                                        <?php
                                                        // Assuming 'c_image' contains the path to the image file
                                                        // Change 'your_image_directory' to the actual directory where images are stored
                                                        $image_path = $row['p_image'];
                                                        ?>
                                                        <img src="<?php echo $image_path; ?>" alt="Product Image" width="100">
                                                    </td>
                                                    <!-- <td><?php //echo $row['p_image']; 
                                                                ?></td> -->
                                                    <td><?php echo $row['price']; ?></td>
                                                    <td><?php echo $row['sell_price']; ?></td>
                                                    <td><?php echo $row['qty']; ?></td>

                                                    <td class="text-right">
                                                        <a href="edit_product.php?id=<?php echo $row['p_id']; ?>" class="btn btn-primary btn-md mb-1">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                        <button class="btn btn-danger btn-md mb-1" onclick="deleteProduct(<?php echo $row['p_id']; ?>)">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                        <script>
                                                            function deleteProduct(productId) {
                                                                if (confirm('Are you sure you want to delete this Product?')) {
                                                                    // If user confirms deletion, redirect to delete_category.php with the category ID
                                                                    window.location.href = 'delete_product.php?id=' + productId;
                                                                }
                                                            }
                                                        </script>

                                                    </td>
                                                </tr>
                                        <?php
                                                $counter++;
                                            }
                                        }

                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
        <!-- Add Modal -->
        <div id="addModal" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Add Item</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="form">
                        <form action="insert_product.php" method="post" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="itemName">Product Name :</label>
                                    <input type="text" class="form-control" id="p_name" name="p_name">
                                </div>
                                <div class="form-group">
                                    <label for="category">Category:</label>
                                    <select class="form-control" id="catogory" name="catogory">
                                        <?php
                                        // Assuming you have a database connection
                                        include 'config.php';

                                        // Fetch categories from the database
                                        $query = "SELECT c_id, c_name FROM category";
                                        $result = mysqli_query($con, $query);

                                        // Check if query was successful
                                        if ($result) {
                                            // Loop through each category and create an option in the dropdown
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option name='c_id' value='" . $row['c_id'] . "'>" . $row['c_name'] . "</option>";
                                            }
                                        } else {
                                            echo "Error: " . mysqli_error($con);
                                        }

                                        // Close the connection
                                        mysqli_close($con);
                                        ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="itemName">Select Image :</label>
                                    <input type="file" class="form-control" id="p_image" name="p_image">
                                </div>
                                <div class="form-group">
                                    <label for="itemName">Price :</label>
                                    <input type="text" class="form-control" id="price" name="price">
                                </div>
                                <div class="form-group">
                                    <label for="itemName">Selling Price :</label>
                                    <input type="text" class="form-control" id="sell_price" name="sell_price">
                                </div>
                                <div class="form-group">
                                    <label for="itemName">Quantity:</label>
                                    <input type="text" class="form-control" id="qty" name="qty">
                                </div>
                            </div>

                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name='submit'>Add Item</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- JavaScript to handle modal toggling -->
        <script>
            // Function to show the modal
            function showAddModal() {
                $('#addModal').modal('show');
            }

            // Function to add item (you can modify this according to your requirements)
            function addItem() {
                // Here, you can write JavaScript code to handle form submission and store data in the database
                // For demonstration, let's just close the modal
                $('#addModal').modal('hide');
            }
        </script>

    </div>


    <script src="assets/js/jquery-3.6.0.min.js" type="72c645589efd6045ca20c4bb-text/javascript"></script>

    <script src="assets/js/bootstrap.bundle.min.js" type="72c645589efd6045ca20c4bb-text/javascript"></script>

    <script src="assets/js/jquery.slimscroll.js" type="72c645589efd6045ca20c4bb-text/javascript"></script>

    <script src="assets/js/select2.min.js" type="72c645589efd6045ca20c4bb-text/javascript"></script>
    <script src="assets/js/moment.min.js" type="72c645589efd6045ca20c4bb-text/javascript"></script>

    <script src="assets/js/fullcalendar.min.js" type="72c645589efd6045ca20c4bb-text/javascript"></script>
    <script src="assets/js/jquery.fullcalendar.js" type="72c645589efd6045ca20c4bb-text/javascript"></script>

    <script src="assets/plugins/morris/morris.min.js" type="72c645589efd6045ca20c4bb-text/javascript"></script>
    <script src="assets/plugins/raphael/raphael-min.js" type="72c645589efd6045ca20c4bb-text/javascript"></script>
    <script src="assets/js/apexcharts.js" type="72c645589efd6045ca20c4bb-text/javascript"></script>
    <script src="assets/js/chart-data.js" type="72c645589efd6045ca20c4bb-text/javascript"></script>

    <script src="assets/js/app.js" type="72c645589efd6045ca20c4bb-text/javascript"></script>
    <script src="../../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="72c645589efd6045ca20c4bb-|49" defer></script>
    </body>

    <!-- Mirrored from preadmin.dreamstechnologies.com/html/school/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Apr 2024 10:39:13 GMT -->

</html>