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
  $userLoc = ".";
  $publicLoc = "../public";
  $pageTitle = "Welcome";
  $isUserLoggedIn = isset($_SESSION['username']);
  $additionalHead = '<meta http-equiv="refresh" content="2;url=/tubes_new/index.php" />';
  include '../includes/navbar.php'; // Ganti 'includes' dengan path yang benar
?>
<div class="container m-5">
    <h1 class="text-center">Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p class="text-center">Ini adalah halaman sambutan setelah Anda berhasil login.</p>
    <p class="text-center">Kamu akan diarahkan ke Home</p>
</div>

<?php
  $assetLoc = "../assets";
  include '../includes/footer.php'; // Ganti 'includes' dengan path yang benar
?>
