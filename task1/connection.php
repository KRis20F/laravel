<?php
try {
    $host = 'localhost';
    $dbname = 'users_crud';  
    $username = 'root';      
    $password = '';          
    
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    die();
}
?> 