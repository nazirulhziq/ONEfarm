<?php
	$db=mysqli_connect("us-cdbr-east-06.cleardb.net","be1e7880320ee9","63c35bd6","heroku_8d9f86b3e1930ef");
	if(!$db){
		die("Connection failed".mysqli_connect_error());
	}

?>