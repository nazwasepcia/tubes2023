<?php
session_start();

include '../includes/db_connect.php';
include '../includes/functions.php';

$error = '';

if ($server["REQUEST_METHOD"] == "POST") {
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
    
</body>
</html>