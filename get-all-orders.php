<?php
require_once 'connection.php';

    $sql = "SELECT * FROM `order_details`";
    $result = mysqli_query($conn, $sql);

    $json_arr = array();

    while ($row=mysqli_fetch_array($result)) {
        $arr = array("id" => $row['id'] ,"shopname" => $row['shopname'], "shopaddress" => $row['shopaddress'],
        "orderDate" => date("d-m-Y", $row['ordertime']),"totalPrice" => $row['totalPrice'],"advancedAmt" => $row['advancedAmt'],
        "order_table" => $row['order_table'],"delivery_stat" => $row['delivery_stat']);

        array_push($json_arr, $arr);
    }

    echo json_encode($json_arr);
