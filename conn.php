	<?php 
	$host = "us-cdbr-east-06.cleardb.net";
	$user = "be1e7880320ee9";
	$pass = "63c35bd6";

	try {
		$con = new PDO("mysql:host=$host;dbname=heroku_8d9f86b3e1930ef", $user, $pass);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo 'Connection Failed:' . $e->getMessage();
	}
?>
