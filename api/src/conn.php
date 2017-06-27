<?php
$servername = "localhost";
$username = "root";
$password = "coderslab";
$baseName = "bookstore";


try {
        $conn = new PDO("mysql:charset=utf8;dbname=$baseName", 
                $username, 
                $password/*, 
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING ]*/);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    catch(PDOException $e) {
        echo 'Wystąpił błąd przy połączeniu do bazy danych: ' . $e->getMessage();
    };
