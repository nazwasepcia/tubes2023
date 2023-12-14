<?php
session_start();

include '../includes/db_connect.php';
include '../includes/functions.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username =($_POST['username']);
    $password = ($_POST['password']);

    $user= validateUser($pfo, $username, $password);
    if ($user) {
        $_SESSION['loggedin']= true ;
        $_SESSION['username']= $username ;
        $_SESSION['user_id']= $user['id'] ;

        header("location: welcome.php");
        exit;
    } else {
        $error = 'Username atau password salah';
    }
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true ) {
    header("location: welcome.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div>
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

</body>
</html>