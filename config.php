<?php
session_start();

$host = "localhost";
$db   = "crudLab";
$user = "root"; 
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}

function checkLogin() {
    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit();
    }
}
