<?php


      require_once 'connection.php';

    	$inpID = $_POST['prodID'];
    	$inpItemName = $_POST['itemName'];
    	$inpBrand = $_POST['brand'];
    	$inpDate = $_POST['date'];
    	$inpDetails = $_POST['details'];
    	$inpPrice = $_POST['price'];
    	$inpQuant = $_POST['quantity'];
    	$image = $_POST['image'];


      if (empty($image) || $image == '') {
        $upload_path = NULL;
        $sql = "INSERT INTO `products`(`productId`, `productName`, `Company`, `entryDate`, `details`, `productPrice`, `productQuantity`, `imageLink`) VALUES ('$inpID' , '$inpItemName' , '$inpBrand' , '$inpDate' , '$inpDetails' , '$inpPrice' , '$inpQuant' , '$upload_path' )";
               if (mysqli_query($conn , $sql)) {
              echo "success1";
            }else{
                echo 'not success';
            }
      }else {
        $upload_path = 'productImage/'.time().'.jpg';
        file_put_contents($upload_path,base64_decode($image));
        $sql = "INSERT INTO `products`(`productId`, `productName`, `Company`, `entryDate`, `details`, `productPrice`, `productQuantity`, `imageLink`) VALUES ('$inpID' , '$inpItemName' , '$inpBrand' , '$inpDate' , '$inpDetails' , '$inpPrice' , '$inpQuant' , '$upload_path' )";
               if (mysqli_query($conn , $sql)) {
              echo "success2";
            }else{
                echo 'not success';
            }


      }


mysqli_close($conn);
?>
