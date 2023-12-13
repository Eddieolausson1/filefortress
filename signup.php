<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $userFolderPath = 'ff-users/' . $username . '/';

    if (!file_exists($userFolderPath)) {
        mkdir($userFolderPath, 0777, true);
        file_put_contents($userFolderPath . 'password.txt', $password);
        echo 'Registration successful. You can now log in.';
    } else {
        echo 'Username already exists. Choose a different one.';
    }
}
?>
