<?php
session_start();

include '../includes/db_connect.php';
include '../includes/functions.php';

$error = '';

if (isset($_POST['register'])) {
    // Ganti dengan path yang benar ke file koneksi database Anda
    require '../includes/db_connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $redirectURL = "login.php";

    registerUser($pdo, $username, $password, $confirm_password, $redirectURL);
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true ) {
    header("location: ../index.php");
    exit;
}

?>

<?php
  $assetLoc = "../assets";
  $userLoc = ".";
  $pageTitle = "Register";
  $isUserLoggedIn = isset($_SESSION['username']);
  include '../includes/navbar.php'; // Ganti 'includes' dengan path yang benar
?>

<div class="container m-5">
    <h2>Register</h2>
    <form action="register.php" method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" name="register">Register</button>
    </form>
</div>

<?php
  $assetLoc = "../assets";
  include '../includes/footer.php'; // Ganti 'includes' dengan path yang benar
?>
    
