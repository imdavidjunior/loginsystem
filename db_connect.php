<?php
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "users_db";

try {
    $dsn = "mysql:host=$serverName;dbname=$dbName";
    $pdo = new PDO($dsn, $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully to the database!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}