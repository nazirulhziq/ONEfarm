<?php

session_start();
require_once "connection.php";

$role="";

if (isset($_POST["submit"])) 
{

	$staffEmail = $_POST["staffEmail"];
	$staffPass = md5($_POST["staffPass"]);

	$query = "SELECT * FROM staff WHERE staffEmail = '$staffEmail' AND staffPass = '$staffPass' AND staffAvail= 0 ";
	$result = mysqli_query($conn,$query);

	if(mysqli_num_rows($result) > 0)
	{
		while ($row = mysqli_fetch_assoc($result)) 
		{
			// if account is activated
		if ($row["staffActivate"] == '1') 
		{
			if ($row["staffType"] == "Admin") 
			{
				
					$_SESSION['username'] = $row["staffEmail"];
					$_SESSION['staffName'] = $row["staffName"];					
					$_SESSION['staffType'] = $row["staffType"];
					$_SESSION['staffID'] = $row["staffID"];
					$_SESSION['staffPhoneNo'] = $row["staffPhoneNo"];

					header('Location:Admin/index.php');
				}
				else if ($row["staffType"] == "Staff") 
				{
					$_SESSION['username'] = $row["staffEmail"];
					$_SESSION['staffName'] = $row["staffName"];					
					$_SESSION['staffType'] = $row["staffType"];
					$_SESSION['staffID'] = $row["staffID"];
					$_SESSION['staffPhoneNo'] = $row["staffPhoneNo"];
					header('Location:Staff/index.php');
				}
			}
			// if account is not activated yet
			else
			{
				header('location:setSecret.php?staffEmail='.$staffEmail);
				
			}
		}

	}	
	
	else
	{
		echo "<script>alert('Wrong Username or Password!');
 	          document.location='staff.php'</script>";
	}

}
?>
