<?php

require_once 'connection.php';

$id = $_GET['id'];
$opp = $_GET['opp'];

$q = "SELECT `delivery_stat`,`order_table` FROM `order_details` WHERE `order_details`.`id` = $id";
$res = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($res);

if ($opp == 'update') {
    if ($row['delivery_stat'] == 0) {
        $q = "UPDATE `order_details` SET `delivery_stat` = '1' WHERE `order_details`.`id` = $id";
        mysqli_query($conn, $q);
    } else {
        $q = "UPDATE `order_details` SET `delivery_stat` = '0' WHERE `order_details`.`id` = $id";
        mysqli_query($conn, $q);
    }
} elseif ($opp == 'remove') {
    $q =  "DELETE FROM `order_details` WHERE `order_details`.`id` = $id";
    mysqli_query($conn, $q);

    $q =  "DROP TABLE '".$row['order_table']."'";
    mysqli_query($conn, $q);
}
