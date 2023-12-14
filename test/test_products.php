<?php
include '../includes/db_connect.php';

$tables = ["produk","users","kategori"];
foreach ($tables as $table){
    try {
        $sql = "select * from $table";
        $stmt = $pdo->query ($sql);
    
        if($stmt->rowcount() > 0){
            echo "<br>";
            foreach ($stmt as $row) {
                foreach ($row as $key => $value){
                    echo $key . ": " . $value . " - ";
                }
                echo "<br>"; 
            }
        } else {
            echo "tidak ada $table ditemukan.";
        }
    } catch(PDOException $e){
        die("ERROR: tidak bisa mengambil data.". $e->getMessage());
    }
}
?>