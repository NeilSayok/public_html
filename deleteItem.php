<?php
require_once 'connection.php';


        $inpOldID = $_POST['key_id'];
        $inpOldImagePath = $_POST['path'];

        if (empty($inpOldImagePath) || $inpOldImagePath == '') {
            $sql = 'SELECT `imageLink` FROM `products` WHERE `id` = "'.$inpOldID.'"';
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $inpOldImagePath = $row['imageLink'];
        }

        $sql = 'SELECT `imageLink` FROM `products` WHERE `id` = "'.$inpOldID.'"';

        $sql = "DELETE FROM `products` WHERE `id` = '".$inpOldID."'";
        echo 'Deleted Item No:'.$inpOldID;
        mysqli_query($conn, $sql);

        if (file_exists($inpOldImagePath)) {
            unlink($inpOldImagePath);
        }
