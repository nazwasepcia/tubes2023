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

function registerUser($pdo, $username, $password, $confirm_password, $redirectURL) {
    if ($password == $confirm_password) {
        // Persiapan query untuk memasukkan data ke database
        $query = "INSERT INTO users (username, password, level) VALUES (?, ?, 'pelanggan')";
        $stmt = $pdo->prepare($query);

        // Eksekusi query
        if ($stmt->execute([$username, $password])) {
            echo "User berhasil didaftarkan!";
            // Redirect ke halaman login atau lainnya
            header("Location: $redirectURL");
            exit();
        } else {
            echo "Terjadi kesalahan saat mendaftar.";
        }
    } else {
        echo "Konfirmasi password tidak cocok.";
    }
}

?>