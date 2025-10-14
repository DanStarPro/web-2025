<?php
if (!function_exists('connectDatabase')) {
    function connectDatabase(): PDO {
        $dsn = 'mysql:host=127.0.0.1;dbname=blog;charset=utf8';
        $user = 'root';
        $password = '';
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
?>