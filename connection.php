<?php

define('servername', 'localhost');
define('user', 'id8396606_neilmajumder');
define('password', 'Mypassword1#');
define('database', 'id8396606_inventorymanagement');

$conn = mysqli_connect(servername, user, password, database) or die("Connection failed: " . $conn->connect_error);
