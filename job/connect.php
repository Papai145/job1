<?php
$host = 'localhost';//имя хоста
$login = 'root';//логин в денвере
$pass = 'root';//пароль в денвере
$db = 'job1';//имя нашей базы данных
$connection = new mysqli ($host,$login,$pass,$db);//соединение с базой данных
if($connection ->connect_error) die($connection->connect_error);//если произошла ошибка при соединение тогда останови выполнение кода и выведи эту ошибку
$connection -> set_charset("utf8");
?>