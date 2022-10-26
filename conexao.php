<?php

$db_name = 'banco';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

//conexão
$pdo = new PDO("mysql:dbname=banco;host=localhost", "root", "");
$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user,$db_pass);

?>