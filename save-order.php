<?php
require_once 'connection.php';

$shop_name = $_POST['shop_name'];
$shop_address = $_POST['shop_address'];
$total_price = $_POST['total_price'];
$advance_amt = $_POST['advance_amt'];
$order_data = $_POST['order_data'];

$t = time();
$table_name = "";

foreach (str_split($shop_name) as $input_char) {
    $input_char = ord($input_char);
    if (($input_char >= 48 && $input_char <= 57) || ($input_char >= 65 && $input_char <= 90)
        || ($input_char >= 97 && $input_char <= 122)|| ($input_char == '_')) {
        $table_name = $table_name.chr($input_char);
    } else {
        $table_name = $table_name.'_';
    }
}

$table_name = $table_name.$t;
echo $table_name;

$query = "INSERT INTO `order_details`(`shopname`, `shopaddress`, `ordertime`, `totalPrice`, `advancedAmt`, `order_table`) VALUES ('$shop_name' , '$shop_address' , '$t' , '$total_price' , '$advance_amt' , '$table_name')";
 if (mysqli_query($conn, $query)) {
     $query_create_table = "CREATE TABLE `".$table_name."` ( `item_id` INT NOT NULL , `quantity` VARCHAR(100) NOT NULL ) ENGINE = InnoDB";
     if (mysqli_query($conn, $query_create_table)) {
         $array = json_decode($order_data, true);
         foreach ($array as $row) {
             $ins_query = "INSERT INTO `".$table_name."`(`item_id`, `quantity`) VALUES ('".$row['id']."' , '".$row['quantity']."' )";
             mysqli_query($conn, $ins_query);
         }
     } else {
         $del_querry = "DELETE FROM `order_details` WHERE `order_table` = '$table_name'";
         mysqli_query($conn, $del_querry);
     }
 }
