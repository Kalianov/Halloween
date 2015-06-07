<?php
$host = 'localhost';
$user = 'root';
$pass = '31415926';
//Если переменная Name передана

$link = mysqli_connect($host, $user, $pass, 'Students');
if (mysqli_connect_errno()) { //возращает последнюю ошибку
    printf("Не удалоь подключится ", mysqli_connect_error());
    exit();
}
?>