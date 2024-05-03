<?php
header('Content-Type: application/json; charset=UTF-8');
header("HTTP/1.1 200 OK");
include '../config.php';

// $fetch = json_decode(file_get_contents('php://input'), true);

$c_id = $_POST['c_id'];

$get_product = mysqli_query($con, "select * from product where c_id = '$c_id' order by p_id asc");
$row = mysqli_fetch_all($get_product, MYSQLI_ASSOC);
$num_rows = mysqli_num_rows($get_product);
$type = 'product';

foreach ($row as $product_list) {
    # code...$data
    $data[] = array(
        'p_id' => $product_list['p_id'],
        'c_id' => $product_list['c_id'],
        'p_name' => $product_list['p_name'],
        'p_image' => $product_list['p_image'],
        'price' => $product_list['price'],
        'sell_price' => $product_list['sell_price'],
        'qty' => $product_list['qty']
    );
}

if (isset($data) && !empty($data)) {
    $result[$type] = $data;
} else {
    $result[$type] = array();
}

if (isset($result)) {
    $output = array(
        'status' => 1,
        'message' => 'Product List',
        'code' => http_response_code(),
        'data' => $result



    );
    echo json_encode($output);
} else {
    $output = array(
        'status' => 0,
        'message' => 'Something Went Wrong',
        'code' => http_response_code(),
        'data' => array()
    );
    echo json_encode($output);
}
