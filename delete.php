<?php
    session_start();
    $username = $_SESSION['username'];
    $file_name = $_GET["file_name"];
    
    $fullpath = sprintf('/home/ehedden/fileSharingUsers/%s/%s', $username, $file_name);
    unlink($fullpath);
    header("Location: usermainpage.php");
    //echo("File deleted.");
  //echo("<br>");
    //echo"<a href='usermainpage.php'> Return to File Selection Screen </a>";
    exit;
?>