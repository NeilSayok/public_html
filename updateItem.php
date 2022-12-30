<?php

require_once 'connection.php';

    $inpOldID = $_POST['key_id'];
    $inpOldImagePath = $_POST['path'];


    $inpID = $_POST['prodID'];
    $inpItemName = $_POST['itemName'];
    $inpBrand = $_POST['brand'];
    $inpDate = $_POST['date'];
    $inpDetails = $_POST['details'];
    $inpPrice = $_POST['price'];
    $inpQuant = $_POST['quantity'];
    $inpImage = $_POST['image'];

    if (is_null($inpImage) || strlen($inpImage) == 0) {
        echo "here";
        echo "       ".$inpOldID."            ";
        $upload_path = null;

        $sql = "DELETE FROM `products` WHERE `id` = '".$inpOldID."'";
        echo $sql;
        mysqli_query($conn, $sql);
        if (file_exists($inpOldImagePath)) {
            unlink($inpOldImagePath);
        }

        $sql = "INSERT INTO `products`(`productId`, `productName`, `Company`, `entryDate`, `details`, `productPrice`, `productQuantity`, `imageLink`)
        VALUES ('$inpID' , '$inpItemName' , '$inpBrand' , '$inpDate' , '$inpDetails' , '$inpPrice' , '$inpQuant' , '$upload_path')";
        if (mysqli_query($conn, $sql)) {
            echo "success1";
            echo $sql;
        } else {
            echo 'not success';
        }
    } else {
        $upload_path = 'productImage/'.time().'.jpg';
        $sql = "DELETE FROM `products` WHERE `id` = '".$inpOldID."'";
        echo $sql;
        mysqli_query($conn, $sql);
        if (file_exists($inpOldImagePath)) {
            unlink($inpOldImagePath);
        }
        file_put_contents($upload_path, base64_decode($inpImage));
        $sql = "INSERT INTO `products`(`productId`, `productName`, `Company`, `entryDate`, `details`, `productPrice`, `productQuantity`, `imageLink`)
        VALUES ('$inpID' , '$inpItemName' , '$inpBrand' , '$inpDate' , '$inpDetails' , '$inpPrice' , '$inpQuant' , '$upload_path')";

        if (mysqli_query($conn, $sql)) {
            echo "success2";
            echo $sql;
        } else {
            echo "error1";
        }


        /* else {
           echo "error2";
         }*/
        echo $upload_path;
    }
