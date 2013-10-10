<?php #dbc.php

$dbc = "mysql:host=localhost;dbname=learnsite";
$login="root";
$password="";
$opt = array(
    // any occurring errors wil be thrown as PDOException
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // an SQL command to execute when connecting
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
);

$pdo = new PDO($dbc, $login, $password, $opt);

?>
