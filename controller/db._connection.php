<?php
$servername = "marcoslopez.cat";
$username = "ftp.marcoslopez.cat";
$password = "J4l2YscWxa";
$dbname = "ddb237160";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
