<?php
    session_start();
    $file_name = basename($_GET["file_name"]); 
    $username = $_SESSION["user"];
    $path = sprintf('/home/ehedden/fileSharingUsers/%s/%s', $username, $filename);
    //Check if the file exists
    if (!file_exists($path)) {  
        echo "Error, trouble locating file";  
        header("Location: usermainpage.php");
        exit ();  
    } else {  
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
    // read the file from disk
    readfile($file);
    exit();
    /* 
        $file = fopen($path, "r");  
        //Input the file label
        header("Content-type: application/octet-stream" );  
        header("Accept-Ranges: bytes" );  
        header("Accept-Length: " . filesize ($path) );  
        header("Content-Disposition: attachment; filename=" . $file_name);  

        //Output the content 
        //Read and output to the browser 
        echo fread ($file, filesize ($path) );  
        fclose ($file);  
        */
    }  
?> 