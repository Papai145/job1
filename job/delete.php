<?php
require('connect.php');
$id = $_GET['id'];
$query = "DELETE FROM schedule WHERE id = '$id'";
$result = mysqli_query($connection, $query);
echo 'поездка '.$id.' -удалена';