<?php
include('connect.php');

	$animalID = $_GET['animalID'];
	$delete = $con->prepare("UPDATE animal SET animalAvail = 1 WHERE animalID = '$animalID'");
	$delete->execute();

	echo "<script>alert('Deactivation animal Success');
        document.location='animalAll.php'</script>";
?>