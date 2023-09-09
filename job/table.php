<?php
require('connect.php');

$city = $_GET['city'];
$name = $_GET['name'];
if (!empty($city) and !empty($name)){
    $query = "SELECT id,fio,city,date_of_departure,arrival_date,return_date FROM `schedule` WHERE `city` = '$city' AND `fio` = '$name'";
        $result = mysqli_query($connection, $query);
        $arr = [];
        while($row = mysqli_fetch_assoc($result)){
            $arr[] = $row;
        }
        echo json_encode($arr);
}
elseif (!empty($city) and $name = " ") {
    $query = "SELECT id,fio,city,date_of_departure,arrival_date,return_date FROM `schedule` WHERE `city` = '$city'";
    $result = mysqli_query($connection, $query);
    $arr = [];
    while($row = mysqli_fetch_assoc($result)){
        $arr[] = $row;
    }
    echo json_encode($arr);
}
elseif (!empty($name) and $city = " ") {
    $query = "SELECT id,fio,city,date_of_departure,arrival_date,return_date FROM `schedule` WHERE  `fio` = '$name'";
    $result = mysqli_query($connection, $query);
    $arr = [];
    while($row = mysqli_fetch_assoc($result)){
        $arr[] = $row;
    }
    echo json_encode($arr);
}
else{
    $query = "SELECT id,fio,city,date_of_departure,arrival_date,return_date FROM `schedule`";
    $result = mysqli_query($connection, $query);
    $arr = [];
    while($row = mysqli_fetch_assoc($result)){
        $arr[] = $row;
    }
    echo json_encode($arr);
}

