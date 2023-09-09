<?php
require('connect.php');
$queryFio = "SELECT fio FROM `cauriers`";
$resultFio = mysqli_query($connection, $queryFio);
$rowFio = mysqli_fetch_all($resultFio);
echo json_encode($rowFio);
?>