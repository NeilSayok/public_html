<?php

require_once 'connection.php';


$input = filter_input_array(INPUT_POST);

if ($input['action'] == 'edit') {
    $update_field='';
    if (isset($input['productId'])) {
        $update_field.= "productId='".$input['productId']."'";
    } elseif (isset($input['productName'])) {
        $update_field.= "productName='".$input['productName']."'";
    } elseif (isset($input['Company'])) {
        $update_field.= "Company='".$input['Company']."'";
    } elseif (isset($input['entryDate'])) {
        $update_field.= "entryDate='".$input['entryDate']."'";
    } elseif (isset($input['details'])) {
        $update_field.= "details='".$input['details']."'";
    } elseif (isset($input['productPrice'])) {
        $update_field.= "productPrice='".$input['productPrice']."'";
    } elseif (isset($input['productQuantity'])) {
        $update_field.= "productQuantity='".$input['productQuantity']."'";
    }
    if ($update_field && $input['id']) {
        $sql_query = "UPDATE products SET $update_field WHERE id='" . $input['id'] . "'";
        mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
    }
}
