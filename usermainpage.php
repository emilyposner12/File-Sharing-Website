<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "mainpagestyling.css">
        <meta charset="UTF-8">
        <title> Files </title> 
    </head>

<body>
    <h1>Your Files</h1>
<br>
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
				echo "<button id = 'fileaction'><a href='download.php?file_name=$entry'>Download </a></button>";
				echo "<button id = 'fileaction'><a href='viewFile.php?file_name=$entry' target=_blank>View </a></button>";
				echo "<button id = 'fileaction'><a href='delete.php?file_name=$entry'>Delete </a></button>";
                echo "<br>";
            }
        }
		closedir($directory);
	}
    else{
        echo "Invalid Username.";
        echo"<a href='homepage.html'> Return to Login Page </a>";
        exit;
    }
?>
<!--buttons to logout and upload a file-->
<br>
<form name="uploadFile" method="post" action="uploadFile.html">
  <input name="submit1" type="submit" id="submit2" value="Upload a File">
  </label>
</form>

<br>

<form name="logout" method="post" action="logout.php">
  <input name="submit2" type="submit" id="submit2" value="Log Out">
  </label>
</form>

</body>
</html>




  