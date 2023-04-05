<?php

//main connection file for both admin & front end
$servername = "us-cdbr-east-06.cleardb.net"; //server
$username = "be1e7880320ee9"; //username
$password = "63c35bd6"; //password
$dbname = "heroku_8d9f86b3e1930ef";  //database

// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname); // connecting 
// Check connection
if (!$db) {       //checking connection to DB	
    die("Connection failed: " . mysqli_connect_error());
}

?>