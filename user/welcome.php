<?php
// Mulai session
session_start();

// Cek jika pengguna tidak login, arahkan ke halaman login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2;url=/tubes_new/index.php" />
    <title>Welcome</title>
    <!-- Sertakan file CSS -->
    <link rel="stylesheet" type="text/css" href="path/to/your/css">
</head>
<body>

    <div>
        <h1>Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>Ini adalah halaman sambutan setelah Anda berhasil login.</p>
        <p>Kamu akan diarahkan ke Home</p>
        <p><a href="logout.php">Logout</a></p>
    </div>

</body>
</html>
