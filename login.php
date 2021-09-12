<!DOCTYPE html>
<?php
    session_start();
    $username = ($_POST["username"]);
    $_SESSION['username'] = $username;
    if ($username == ""){
        echo"User name cannot be blank";
        echo"<a href='homepage.html'> Return to Login Page </a>";
        exit;
    }
    /*
    $h = fopen("/~ehedden/users.txt", "r");
    $linenum = 1;
    echo "<ul>\n";
    while( !feof($h) ){
	    printf("\t<li>Line %d: %s</li>\n",
		$linenum++,
		fgets($h)
	);d
}
    echo "</ul>\n";
    fclose($h);
    */
    
    $userTxt = fopen("/home/ehedden/users.txt", "r");

       while(!feof($userTxt)){
            $lineSearch = fgets($userTxt);
            if($username == trim($lineSearch)){
                //redirect to username file directory
                echo "Found username";
                $redirectURL = "/~ehedden/usermainpage.php?user=" .htmlentities($username); 
                header("Location: " .$redirectURL);
                exit;
            }
        }
        //if username was not found
        fclose($userTxt);
        echo("Invalid Username");
        echo "<br>";
        echo"<a href='homepage.html'> Return to Login Page </a>";
    ?>