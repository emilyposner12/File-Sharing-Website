<?php
    session_start();
    if(isset($_POST['usernameToShareWith'])){
       $userNameToShareWith = $_POST["usernameToShareWith"];
    }
    $currentUser = $_SESSION['username'];
    $fileToShare = $_SESSION["fileToShare"];
    
    $sourceFilepath = sprintf('/home/ehedden/fileSharingUsers/%s/%s', $currentUser, $fileToShare);
    $destinationFilePath = sprintf('/home/ehedden/fileSharingUsers/%s/%s', $userNameToShareWith, $fileToShare);

    copy($sourceFilepath, $destinationFilePath);
    echo "File Shared.";
    echo "<br>";
    echo("Current User: " .$currentUser);
    echo("File to Share: " .$fileToShare);
    echo"<a href='usermainpage.php'> Return to File Selection Screen </a>";
    exit;
?>