<?php
include('connect.php');

	$breedID = $_GET['breedID'];
	$delete = $con->prepare("UPDATE breed SET breedAvail = 1 WHERE breedID = '$breedID'");
	$delete->execute();

	echo "<script>alert('Deactivation item Success');
        document.location='breedAll.php'</script>";
?>