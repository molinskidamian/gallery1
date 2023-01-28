<?php
  try {
      include './config.php';
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES "utf8"');
    } catch (PDOException $e) {
        $output = 'Nie można nawiązać połączenia z bazą danych.<br>' . $e->getMessage() .'<br>'. $e->getLine();
        include_once './views/error.html.php';
        exit();
    }

    // echo 'połączono z bazą danych.';
?>