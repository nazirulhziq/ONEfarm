<?php
	session_start();
	unset($_SESSION["username"]);
	unset($_SESSION["staffName"]);
	unset($_SESSION["staffType"]);
	unset($_SESSION["staffID"]);
	unset($_SESSION["staffPhoneNo"]);
	
	echo "<script>alert('You have logged out');
            document.location='../staff.php'</script>";
?>
