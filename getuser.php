<!DOCTYPE html>
<html>
<?php
include("connection/connect.php"); // connection to db
error_reporting(0);
session_start();


?>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$conn = mysqli_connect('localhost','root','','onefarm');
if (!$conn) {
  die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn,"onefarm");
$sql="SELECT * FROM card WHERE  cardID = '".$q."'";
$result = mysqli_query($conn,$sql);


 

echo "<table>
<tr>
<th>Card ID</th>
<th>Name On The Card</th>
<th>Card Number</th>
<th>Expiry Date</th>
<th>CVV</th>
</tr>";
while($row = mysqli_fetch_array($result)) {


$CardBank=$row['CardBank'];
// Store cipher method
$ciphering = "AES-128-CTR";
  
// Use OpenSSl encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$decryption_iv = '1234567891011121';

  
// Store the decryption key
$decryption_key = "GeeksforGeeks";
  
// Descrypt the string
$decryption=openssl_decrypt ($CardBank, $ciphering, 
        $decryption_key, $options, $decryption_iv);



  echo "<tr>";
  echo "<td>" . $row['cardID'] . "</td>";
  echo "<td>" . $row['NameOnCard'] . "</td>";
  echo "<td>" . $decryption. "</td>";
  echo "<td>" . $row['ExpiryDate'] . "</td>";
  echo "<td>" . $row['CVV'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
?>
</body>
</html>