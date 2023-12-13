<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userFilePath = 'ff-users/' . $username . '.txt';

    if (file_exists($userFilePath) && password_verify($password, file_get_contents($userFilePath))) {
        $_SESSION['username'] = $username;
        header('Location: ftp.php');
        exit();
    } else {
        echo 'Invalid username or password.';
    }
}
?>
