<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1; port=3306; dbname=vethospital', 'root', '');
    $pdo->exec('SET NAMES "utf8"');
} catch(PDOException $e) {
    echo($e);
}
?>