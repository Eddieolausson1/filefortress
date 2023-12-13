<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['username'];
    $userFolderPath = 'ff-users/' . $username . '/';

    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];

    if ($fileSize <= 100 * 1024 * 1024) {
        move_uploaded_file($_FILES['file']['tmp_name'], $userFolderPath . $fileName);
        echo 'File uploaded successfully.';
    } else {
        echo 'File size exceeds the limit (100MB).';
    }
}
?>
