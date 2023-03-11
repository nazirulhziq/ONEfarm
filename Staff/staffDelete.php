<?php
include('connect.php');

	$staffID = $_GET['staffID'];
	$delete = $con->prepare("UPDATE staff SET staffAvail = 1 WHERE staffID = '$staffID'");
	$delete->execute();

	echo "<script>alert('Deactivation Account Success');
        document.location='staffAll.php'</script>";
?>