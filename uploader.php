<?php
session_start();
//!!!!!!!
//File Upload works, but need to figure out how to set proper permissions (i.e. currently all user directories 
// are set to chmod 777, will probably get docked points for this.)
//!!!!!!!
//

//modified from course wiki 
// Get the filename and make sure it is valid
$filename = basename($_FILES['uploadedfile']['name']);
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo "Invalid filename";
	exit;
}
// Get the username and make sure it is valid
$username = $_SESSION['username'];
if( !preg_match('/^[\w_\-]+$/', $username) ){
	echo "Invalid username";
	exit;
}

$full_path = sprintf('/home/ehedden/fileSharingUsers/%s/%s', $username, $filename);
if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
	echo "File Upload Success!";
    echo"<a href='homepage.html'> Return to Login Page </a>";
	exit;
}else{
	echo "File Upload Failure.";
    echo"<a href='homepage.html'> Return to Login Page </a>";
    exit;
}

?>