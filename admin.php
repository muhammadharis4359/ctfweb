<?php
session_start();
include 'db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    die("Access Denied!");
}

echo "<h2>Admin Panel - Viewing Comments</h2>";

$result = $conn->query("SELECT * FROM comments ORDER BY created_at DESC");
while ($row = $result->fetch_assoc()) {
    echo "<b>" . htmlspecialchars($row['username']) . ":</b> " . $row['comment'] . "<br>";
}
?>
