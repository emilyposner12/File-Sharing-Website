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
        if(!opendir("/home/ehedden/fileSharingUsers/" .htmlentities($username))){
            echo "Unable to open directory.";
            exit;
        }
        else{
            $directory = opendir("/home/ehedden/fileSharingUsers/" .htmlentites($username)); 
        }

        //list all files in the directory
        while (false !== ($entry = readdir($directory))) {
            if ($entry != "." && $entry != "..") {
                echo "$entry ";
				echo "<td><a href='download.php?file_name=$entry'>Download </a></td>";
				echo "<td><a href='viewing.php?file_name=$entry' target=_blank>View </a></td>";
				echo "<td><a href='delete.php?file_name=$entry'>Delete </a></td>";
                echo "<br>";
            }
        }

        
        /*
        $files = readdir($directory);
        echo "<div class=\"liststyle\">";
		echo "<table>";
		echo "<tr>";
		echo "<th>Filename</th>";
		echo "<th>Download</th>";
		echo "<th>Viewing</th>";
		echo "<th>Deleting</th>";
		echo "</tr>";
        
       
        
		while ($files !== false){
			if(($files !== ".") && ($files !== "..")){
				echo "<tr>";
				echo "<td class=\"style1\">$files</td>";
				echo "<td><a href='download.php?file_name=$files'>Download</a></td>";
				echo "<td><a href='viewing.php?file_name=$files' target=_blank>Viewing</a></td>";
				echo "<td><a href='delete.php?file_name=$files'>Deleting</a></td>";
				echo "</tr>";
			}
			$files = readdir($dir);
		}
		echo "</table>";
		echo "</div>";
        */ 
        echo "<td><a href = 'uploadFile.html'> Click Here to Upload a File </a></td?";
		closedir($directory);
        exit;
	}
    else{
        echo "Username not set.";
        echo"<a href='homepage.html'> Return to Login Page </a>";
        exit;
    }


    
?>
</body>
</html>




  