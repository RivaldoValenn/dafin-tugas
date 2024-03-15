<?php

$db_server = "localhost";
$db_name = "db_pinjam";
$db_user = "root";
$db_pass = "";


try {
    $db_con = new PDO("mysql:host={$db_server};dbname={$db_name}", $db_user, $db_pass);
    $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
