<?php

require_once 'connection.php';


$query = "SELECT * FROM products"; //You don't need a ; like you do in SQL
$result = mysqli_query($conn, $query);
$url = "https://inventorymanagement-system.000webhostapp.com/";

$template = file_get_contents("test.html");

$table = "";



while ($row = mysqli_fetch_array($result)) {
    $imgLink = $row['imageLink'];
    if ($imgLink != '') {
        $imgLink = $url.$imgLink;
    }


    $table = $table.'<tr id ='.$row['id'].'><td class="nr">' . $row['id']
        . "</td><td>" . $row['productId']
        . "</td><td>" . $row['productName']
        . "</td><td>" . $row['Company']
        . "</td><td>" . $row['entryDate']
        . "</td><td>" . $row['details']
        . "</td><td>" . $row['productPrice']
        . "</td><td>" . $row['productQuantity']
        . '</td><td><a href='.$imgLink.'> <img src='.$imgLink.' alt="Not Available" width="50" height="50"> </a></td><td><button style = "width:70%;margin: auto;" type="button" class="del-item"/>Delete Item</td></tr>';
}


$template = str_replace('##% table %##', $table, $template);
echo $template;
