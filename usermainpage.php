<!DOCTYPE html>
<html>
    <head>
        <title> Files </title> 

    </head>

<body>
    

</body>
</html>


<?php
    session_start();
    if(isset($_SESSION['username'])){
        $username = $_SESSION["username"];
        //open directory
        if(!opendir("/home/ehedden/fileSharingUsers/" .$username)){
            echo "/~ehedden/fileSharingUsers/" .$username;
            echo "Unable to open directory.";
        }
        else{
            $directory = opendir("/home/ehedden/fileSharingUsers/" .$username); 
            echo "Entries:\n";
        }

        //list all files in the direxctory
        while (false !== ($entry = readdir($directory))) {
            if ($entry != "." && $entry != "..") {
                echo "$entry\n";
                echo "<tr>";
				echo "<td><a href='download.php?file_name=$entry'>Download</a></td>";
				echo "<td><a href='viewing.php?file_name=$entry' target=_blank>Viewing</a></td>";
				echo "<td><a href='delete.php?file_name=$entry'>Deleting</a></td>";
				echo "</tr>";
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
		closedir($directory);
	}
    echo "Username not set.";
?>

  