<?php
require('connect.php');
$id = $_GET['idTravel'];
$dateOfDeparture = $_GET['dateOfDeparture']; //дата начал пути
$DepartureSec = strtotime($dateOfDeparture); //дата нвчала пути в секундах
$city = $_GET['city'];
$fio = $_GET['fio'];

//проверка даты на формат
$arrDate = explode('-', $dateOfDeparture);
if (!checkdate($arrDate[1], $arrDate[2], $arrDate[0])) {
    echo '<p style="color:#ff0000">неверный формат даты</p>';
    return;
}
//проверка изменение даты
$query1 = "SELECT  `date_of_departure` FROM `schedule` WHERE `id` = '$id'";
$result1 = mysqli_query($connection, $query1);
$row1 = mysqli_fetch_row($result1);
if ($dateOfDeparture === $row1[0]) {
    echo '<p style="color:#ff0000">вы не изменили дату</p>';
    return;
}

$query = "SELECT  * FROM `regions` WHERE `city` = '$city'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
$day =  $row['amount_of_days'];
$secTo = (int)$day * 86400; //секунды в дороге
$toDestinationSec = $secTo + $DepartureSec; //секунды до пункта назначения
$toMcwSec = $secTo * 2 + $DepartureSec; //секунды от начал поездки до возвращения в москву

$toDestination = date("Y-m-d", $toDestinationSec);
$toMcw = date("Y-m-d", $toMcwSec);
//проверка пересения поездок
$query2 = "SELECT  date_of_departure,return_date FROM `schedule` WHERE `fio` = '$fio'";
$result2 = mysqli_query($connection, $query1);
$row2 = mysqli_fetch_all($result1);

function proverka($row2, $DepartureSec, $toMcwSec)
{
    $count1 = (count($row2));
    for ($i = 0; $i < $count1; $i++) {
        if ($DepartureSec < strtotime($row2[$i][1]) and $toMcwSec > strtotime($row2[$i][0])) {
            return true;
        } else {
            continue;
        }
    }
};
$resultProverka = proverka($row2, $DepartureSec, $toMcwSec);
if ($resultProverka) {
    echo '<p style="color:#ff0000">есть пересечения</p>';
} else {
    $query = "UPDATE schedule SET date_of_departure='$dateOfDeparture' ,arrival_date='$toDestination' ,return_date='$toMcw' WHERE id=$id";
    $result = mysqli_query($connection, $query);
    echo '<p style="color:#00ff22">запрос выполнен </p>';
}
//обновление поездка
