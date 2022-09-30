<?php
    $host = 'localhost'; //or IP address: 127.0.0.1
    $db = 'attendance_db';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4'; //symbol

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset"; //data source name for connectivity

    try{
        $pdo = new PDO($dsn, $user , $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        throw new PDOException($e->getMessage());
        //echo "<h3 class='text-danger'>No database found</h3>";
    }

    require_once 'crud.php';
    $crud = new crud($pdo);
?>