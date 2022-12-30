<?php

require_once 'connection.php';

$table = $_POST['table_name'];


$query = "SELECT * FROM ".$table;

$result = mysqli_query($conn, $query);

$json_arr = array();

while ($r=mysqli_fetch_array($result)) {
    $prod_querry = "SELECT * FROM `products` WHERE `id` = '".$r['item_id']."'";
    $res = mysqli_query($conn, $prod_querry);
    $row = mysqli_fetch_array($res);

    $arr = array("id" => $row['id'] ,"productId" => $row['productId'], "productName" => $row['productName'],
    "company" => $row['Company'],"entryDate" => $row['entryDate'],"details" => $row['details'],
    "productPrice" => $row['productPrice'],"productQuantity" => $row['productQuantity'],
    "imageLink" => $row['imageLink'],"order_quantity" => $r['quantity']);

    array_push($json_arr, $arr);
}
echo json_encode($json_arr);
