<?php

header('Content-Type: application/json; charset=UTF-8');
header("HTTP/1.1 200 OK");
include "../config.php";

$dat = json_decode(file_get_contents('php://input'), true);

$categoryId = $dat['cat_id'];
// $categoryName = $dat['cat_name'];
// $categoryImage = $dat['cat_image'];
// $categoryId = $dat['cat_id'];


$in_category = mysqli_query($con, "delete from  category where c_id = '$categoryId'");
// $rows = mysqli_fetch_all($get_categories, MYSQLI_ASSOC);
// $num_rows = mysqli_num_rows($get_categories);

if (isset($in_category)) {
    echo json_encode(array("status" => 1, "message" => "Category deleted Successfully"));
} else {
    echo json_encode(array("status" => 0, "message" => "Category Not deleted"));
}
// print_r($rows);

// $type = 'category';

// foreach ($rows as $category_list) {
//     $data[] = array(
//         "c_id" => $category_list['c_id'],
//         "c_name" => $category_list['c_name'],
//         "c_image" => $category_list['c_image']
//     );
// }
// if (isset($data) && !empty($data)) {

//     $result[$type] = $data;
//     // echo 'if';
// } else {
//     $result[$type] = array();
//     // echo 'else';
// }



// if (isset($result)) {
//     $output = array(
//         'status' => 1,
//         'message' => 'Category List',
//         'code' => http_response_code(),
//         'data' => $result

//     );
//     echo json_encode($output);
// } else {
//     $output = array(
//         'status' => 0,
//         'message' => 'Category List',
//         'code' => http_response_code(),
//         'data' => array()

//     );
//     echo json_encode($output);
// }
