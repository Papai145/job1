<?php
require('connect.php');
$fio = $_GET['fio'];
$city = $_GET['city'];
$DepartureSec = strtotime($_GET['secondDeparture']); //дата нвчала пути 
$Departure = $_GET['secondDeparture'];
$ArrivalDateSec = strtotime($_GET['arrivalDate']); //дата когда приедут в пункт назначения
$ArrivalDate = $_GET['arrivalDate'];
$query = "SELECT  * FROM `regions` WHERE `city` = '$city'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
$returenSec = ($row['amount_of_days'] * 86400) * 2; //дни на обратную дорогу
$dataEnd = $DepartureSec + $returenSec;
$dayMsc = date("Y-m-d", $dataEnd);
$query1 = "SELECT  date_of_departure,return_date FROM `schedule` WHERE `fio` = '$fio'";
$result1 = mysqli_query($connection, $query1);
$row1 = mysqli_fetch_all($result1);

function proverka($row1, $DepartureSec, $dataEnd)
{
    $count1 = (count($row1));
    for ($i = 0; $i < $count1; $i++) {
        if ($DepartureSec < strtotime($row1[$i][1]) and $dataEnd > strtotime($row1[$i][0])) {
            return true;
        }else{
            continue;
        }
    }
};
$resultProverka = proverka($row1, $DepartureSec, $dataEnd);
if($resultProverka){
    echo '<p style="color:#ff0000">есть пересечения</p>';
}else{
    $query1  = "INSERT INTO `schedule` (fio,city,date_of_departure,arrival_date,return_date) VALUES ('$fio','$city','$Departure','$ArrivalDate','$dayMsc')";
    $result1 = mysqli_query($connection, $query1);
    echo '<p style="color:#00ff22">пересечений нет.Дата добавлена</p>';
}
