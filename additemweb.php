<?php
  require_once 'connection.php';

  $target_dir = "productImage/";
  $target_file = $target_dir .time().'.jpg';
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if (isset($_POST["submit"])) {
      try {
          $check = getimagesize($_FILES["image"]["tmp_name"]);
      } catch (Exception $e) {
          $check = false;
      }

      if ($check !== false) {
          $uploadOk = 1;
      } else {
          $target_file = null;
          $inpID = $_POST["productId"];
          $inpItemName = $_POST["productName"];
          $inpBrand = $_POST["brand"];
          $inpDate =  $_POST["date"];
          $inpDetails =  $_POST["details"];
          $inpPrice =  $_POST["price"];
          $inpQuant =  $_POST["quantity"];
          $upload_path =  $target_file;

          $sql = "INSERT INTO `products`(`productId`, `productName`, `Company`, `entryDate`, `details`, `productPrice`, `productQuantity`, `imageLink`)
      VALUES ('$inpID' , '$inpItemName' , '$inpBrand' , '$inpDate' , '$inpDetails' , '$inpPrice' , '$inpQuant' , '$upload_path' )";
          if (mysqli_query($conn, $sql)) {
              header('Location: index.php');
          } else {
              echo "Sorry, there was an error uploading your file1.";
          }
          $uploadOk = 0;
      }
  }


      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          $inpID = $_POST["productId"];
          $inpItemName = $_POST["productName"];
          $inpBrand = $_POST["brand"];
          $inpDate =  $_POST["date"];
          $inpDetails =  $_POST["details"];
          $inpPrice =  $_POST["price"];
          $inpQuant =  $_POST["quantity"];
          $upload_path =  $target_file;

          $sql = "INSERT INTO `products`(`productId`, `productName`, `Company`, `entryDate`, `details`, `productPrice`, `productQuantity`, `imageLink`)
      VALUES ('$inpID' , '$inpItemName' , '$inpBrand' , '$inpDate' , '$inpDetails' , '$inpPrice' , '$inpQuant' , '$upload_path' )";
          if (mysqli_query($conn, $sql)) {
              header('Location: index.php');
          } else {
              echo "Sorry, there was an error uploading your file2.";
          }
      }


mysqli_close($conn);
