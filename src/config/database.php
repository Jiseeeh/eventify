<?php
require('loadEnv.php');

$envFilePath = '../../.env';
loadEnv($envFilePath);

$DSN = "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=utf8";

try {
    $pdo = new PDO($DSN, $_ENV['DB_USER'], '');
    // set default fetch mode
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
