<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=PHPClassSummer2015', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
} catch (PDOException $e) {
    include './includes/Error.php';
    exit();
}
