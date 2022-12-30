<?php

require_once 'connection.php';

if (isset($_GET['key'])) {
    $key = $_GET['key'];
    if (!isset($_GET) || empty($_GET)) {
        $query = 'SELECT * FROM `products`';
    } else {
        $query = 'SELECT * FROM `products` WHERE `productName` LIKE "%'.$key.'%" OR `Company` LIKE "%'.$key.'%" OR `details` LIKE "%'.$key.'%" OR `productId` LIKE "%'.$key.'%"';
    }
    $result = mysqli_query($conn, $query);
    $res = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($res, array('id' => $row['id'],
                              'productId' => $row['productId'],
                              'productName' => $row['productName'],
                              'company' => $row['Company'],
                              'entryDate' => $row['entryDate'],
                              'details' => $row['details'],
                              'productPrice' => $row['productPrice'],
                              'productQuantity' => $row['productQuantity']));
    }
    echo json_encode($res);
} else {
    $res = array();
    echo json_encode($res);
}
