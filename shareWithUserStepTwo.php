<?php
    session_start();
    if(isset($_POST['usernameToShareWith'])){
       $userNameToShareWith = (string)htmlentities($_POST["usernameToShareWith"]);
    }
    if ($userNameToShareWith == ""){
        echo"Username of person to share with cannot be blank.";
        echo"<br>";
        echo"<a href='usermainpage.html'> Return to file selection screen. </a>";
        exit;
    }
    if($userNameToShareWith == $_SESSION['username']){ // if user tries to share file with themselves
        echo "You cannot share a file with yourself.";
        echo "<br>";
        echo"<a href='usermainpage.php'> Return to File Selection Screen </a>";
        exit;
    }
    
    $userTxt = fopen("/home/ehedden/users.txt", "r");
       while(!feof($userTxt)){
            $lineSearch = fgets($userTxt);
            if($userNameToShareWith == trim($lineSearch)){ //if user to share with exists in file system
                $currentUser = $_SESSION['username'];
                $fileToShare = $_SESSION["fileToShare"];
    
                $sourceFilepath = sprintf('/home/ehedden/fileSharingUsers/%s/%s', $currentUser, $fileToShare);
                $destinationFilePath = sprintf('/home/ehedden/fileSharingUsers/%s/%s', $userNameToShareWith, $fileToShare);

                if(copy($sourceFilepath, $destinationFilePath)){ //file share is a success
                    echo "Fileshare Success.";
                    echo "<br>";
                    echo("User Shared With: " .htmlentities($userNameToShareWith));
                    echo "<br>";
                    echo("File Shared: " .htmlentities($fileToShare));
                    echo "<br>";
                    echo"<a href='usermainpage.php'> Return to File Selection Screen </a>";
                    exit;
                }
                else{ //file share has failed
                    echo "Fileshare Failed.";
                    echo"<a href='usermainpage.php'> Return to File Selection Screen </a>";
                    exit;
            }
        }
    }
    echo "The user you want to share with does not exist in the filesystem."; //username is not found in users.txt
    echo"<a href='usermainpage.php'> Return to File Selection Screen </a>";
    exit;
?>