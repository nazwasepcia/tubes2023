<?php
// Mulai session
session_start();

// Cek jika pengguna tidak login, arahkan ke halaman login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

?>

<?php
  $assetLoc = "../assets";
  $pageTitle = "Welcome";
  $isUserLoggedIn = isset($_SESSION['username']);
  $additionalHead = '<meta http-equiv="refresh" content="2;url=/tubes_new/index.php" />';
  include '../includes/navbar.php'; // Ganti 'includes' dengan path yang benar
?>
<div class="container">
    <h1>Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>Ini adalah halaman sambutan setelah Anda berhasil login.</p>
    <p>Kamu akan diarahkan ke Home</p>
    <p><a href="logout.php">Logout</a></p>
</div>

<?php
  $assetLoc = "../assets";
  include '../includes/footer.php'; // Ganti 'includes' dengan path yang benar
?>
