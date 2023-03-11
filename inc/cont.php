<?php
$conn = mysqli_connect("localhost", "root", "", "onefarm");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
date_default_timezone_set("Asia/Kuala_Lumpur");
$error = "";
?>