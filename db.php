<?php
$host = "localhost";
$user = "root"; // Change if necessary
$pass = ""; // Default is empty in XAMPP
$db = "ctf_challenge1";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
