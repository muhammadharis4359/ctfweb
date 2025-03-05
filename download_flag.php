<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    die("Access Denied!");
}

$flagFile = __DIR__ . '/flag.txt';

if (file_exists($flagFile)) {
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="flag.txt"');
    readfile($flagFile);
    exit;
} else {
    die("Flag file not found!");
}
?>
