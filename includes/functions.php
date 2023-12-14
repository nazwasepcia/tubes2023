<?php

function verifyPassword($inputPassword, $storedPassword) {
    return $inputPassword === $storedPassword;
}
function validateUser($pdo, $username, $password) {
    $stmt = $pdo->prepare("select * from users where username = :username");
    $stmt ->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && verifyPassword($password, $user['password'])) {
        return $user;
    } else {
        return false;
    }
}

function getProducts($pdo){
    $stmt =$pdo->query("select * from produk" );
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>