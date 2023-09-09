<?php
require('connect.php');
$queryCity = "SELECT city FROM `regions`";
$resultCity = mysqli_query($connection, $queryCity);
$rowCity = mysqli_fetch_all($resultCity);
echo json_encode($rowCity);
?>