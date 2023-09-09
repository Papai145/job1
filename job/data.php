<?php
require('connect.php');
$data =  $_GET['data'];
$city =  $_GET['city'];
$query = "SELECT  * FROM `regions` WHERE `city` = '$city'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
$day =  $row['amount_of_days'];
$daySec = (int)$day * 86400;
$date_sec = $data + $daySec;
$date = date("Y-m-d",$date_sec);
echo $date;
