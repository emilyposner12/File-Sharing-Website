<!DOCTYPE html>
<html>
    <head>
        <title> Files </title> 

    </head>

<body>
<?php
    session_start();
    if(isset($_SESSION['username'])){
        $username = $_SESSION["username"];
        //open directory
        if(!opendir("/home/ehedden/fileSharingUsers/" .($username))){
            echo "Unable to open directory.";
            exit;
        }
        else{
            $directory = opendir("/home/ehedden/fileSharingUsers/" .($username)); 
        }

        //list all files in the directory
        while (false !== ($entry = readdir($directory))) {
            if ($entry != "." && $entry != "..") {
                echo "$entry ";
				echo "<td><a href='download.php?file_name=$entry'>Download </a></td>";
				echo "<td><a href='viewFile.php?file_name=$entry' target=_blank>View </a></td>";
				echo "<td><a href='delete.php?file_name=$entry'>Delete </a></td>";
                echo "<br>";
            }
        }
        echo "<td><a href = 'uploadFile.html'> Click Here to Upload a File </a></td?";
		closedir($directory);
        exit;
	}
    else{
        echo "Invalid Username.";
        echo"<a href='homepage.html'> Return to Login Page </a>";
        exit;
    }
?>
</body>
</html>




  