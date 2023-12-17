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
            $_SESSION['register_success'] = "Registrasi berhasil, silakan login.";
            echo "User berhasil didaftarkan!";
            // Redirect ke halaman login atau lainnya
            header("Location: $redirectURL");
            exit();
        } else {
            $_SESSION["register_failed"] = "Terjadi kesalahan saat mendaftar.";
        }
    } else {
        $_SESSION["register_failed"] = "Konfirmasi password tidak cocok.";
    }
}

function handleAddProduct($pdo, $postData) {
    // Validasi input (Ini adalah contoh sederhana. Tambahkan validasi sesuai kebutuhan)
    if (empty($postData['nama']) || empty($postData['harga']) || empty($postData['kategori_id'])) {
        return "Semua field harus diisi.";
    }

    // Menyimpan data ke database
    try {
        $query = "INSERT INTO produk (kategori_id, nama, harga, foto, detail, ketersediaan_stok) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            $postData['kategori_id'],
            $postData['nama'],
            $postData['harga'],
            $postData['foto'],
            $postData['detail'],
            $postData['ketersediaan_stok']
        ]);
    } catch (PDOException $e) {
        return "Gagal menyimpan produk: " . $e->getMessage();
    }

    return "Produk berhasil ditambahkan.";
}

?>