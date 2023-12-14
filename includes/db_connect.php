<?php
$host = "localhost";
$dbname = "little_bakery";
$user = "root";
$password = "";
 
try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected succesfully";
} catch(PDOException $e) {
    echo "Connected failed: " . $e->getMessage();
}

?>