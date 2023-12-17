<?php
session_start();

include '../includes/db_connect.php';
include '../includes/functions.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username =($_POST['username']);
    $password = ($_POST['password']);

    $user= validateUser($pdo, $username, $password);
    if ($user) {
        $_SESSION['loggedin']= true ;
        $_SESSION['username']= $username ;
        $_SESSION['user_id']= $user['id'];
        $_SESSION['level']=$user['level'];

        header("location: welcome.php");
        exit;
    } else {
        $error = 'Username atau password salah';
    }
}

if (isset($_SESSION['register_success'])) {
    $registerSuccessMsg = $_SESSION['register_success'];
    unset($_SESSION['register_success']); // Hapus sesi setelah ditampilkan
} else {
    $registerSuccessMsg = '';
}


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true ) {
    header("location: ../index.php");
    exit;
}

?>

<?php
  $assetLoc = "../assets";
  $userLoc = ".";
  $publicLoc = "../public";
  $pageTitle = "Login";
  $isUserLoggedIn = isset($_SESSION['username']);
  include '../includes/navbar.php'; // Ganti 'includes' dengan path yang benar
?>

<div class="container m-5">
    <?php if (!empty($registerSuccessMsg)): ?>
        <div class="alert alert-success"><?php echo $registerSuccessMsg; ?></div>
        <hr>
    <?php endif; ?>

    <h2>Login</h2>
    <p>Silakan masuk ke akun Anda.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Username</label>
            <input type="text" name="username" required>
        </div>    
        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
        <p>Belum punya akun? <a href="register.php">Daftar sekarang</a>.</p>
    </form>
</div>

    <?php 
    if (!empty($error)) {
        echo '<div>' . $error . '</div>';
    }
    ?>

<?php
  $assetLoc = "../assets";
  include '../includes/footer.php'; // Ganti 'includes' dengan path yang benar
?>