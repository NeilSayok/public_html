<?php
require_once 'connection.php';


$id =  $_POST['id'];
$shop_name = $_POST['shop_name'];
$shop_address = $_POST['shop_address'];
$total_price = $_POST['total_price'];
$advance_amt = $_POST['advance_amt'];
$order_data = $_POST['order_data'];
$table_name =  $_POST['table_name'];
$delivery_sat = $_POST['delivery_sat'];

$t = time();

$query = "UPDATE `order_details` SET `shopname`='".$shop_name
."',`shopaddress`='".$shop_address
."',`ordertime`='".$t
."',`totalPrice`='".$total_price
."',`advancedAmt`='".$advance_amt
."',`delivery_stat`='".$delivery_sat."' WHERE `id` = '".$id."'";

 if (mysqli_query($conn, $query)) {
     $query = "DELETE FROM `".$table_name."`";
     if (mysqli_query($conn, $query)) {
         $array = json_decode($order_data, true);
         foreach ($array as $row) {
             $ins_query = "INSERT INTO `".$table_name."`(`item_id`, `quantity`) VALUES ('".$row['id']."' , '".$row['quantity']."' )";
             mysqli_query($conn, $ins_query);
         }
     }
 }
