<?php
require_once 'connection.php';

    $sql = "SELECT * FROM `products`";
    $result = mysqli_query($conn, $sql);

    $json_arr = array();

    while ($row=mysqli_fetch_array($result)) {
        $arr = array("id" => $row['id'] ,"productId" => $row['productId'], "productName" => $row['productName'],"Company" => $row['Company'],"entryDate" => $row['entryDate'],"details" => $row['details'],"productPrice" => $row['productPrice'],"productQuantity" => $row['productQuantity'],"imageLink" => $row['imageLink']);

        array_push($json_arr, $arr);
    }

    echo json_encode($json_arr);
