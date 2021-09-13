<?php
    session_start();
    $username = $_SESSION['user'];
    $file_name = $_GET["file_name"];
    
    $fullpath = sprintf('/home/ehedden/fileSharingUsers/%s/%s', $username, $filename);
    unlink($fullpath);
    header("Location: usermainpage.php");
    exit;
?>