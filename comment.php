<?php
session_start();
include 'db.php';
// echo "Logged in as: " . $_SESSION['username'] . " | Role: " . $_SESSION['role'];

// Ensure user is logged in
if (!isset($_SESSION['username'])) {
    die("Access Denied! You must be logged in.");
}

// Ensure only players can access this page
if ($_SESSION['role'] !== 'user') {
    die("Unauthorized! Only players can access this page.");
}

// Handle comment submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];
    $comment = trim($_POST['comment']);

    if (!empty($comment)) {
        $stmt = $conn->prepare("INSERT INTO comments (username, comment) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $comment);
        $stmt->execute();
        $stmt->close();
        echo "Comment added!";
    } else {
        echo "Comment cannot be empty!";
    }
}

?>

<form method="POST">
    <textarea name="comment" placeholder="Leave a comment..." required></textarea><br>
    <button type="submit">Submit</button>
</form>

<h2>Comments:</h2>
<?php
// Fetch and display comments
$result = $conn->query("SELECT * FROM comments ORDER BY created_at DESC");

while ($row = $result->fetch_assoc()) {
    echo "<b>" . htmlspecialchars($row['username']) . ":</b> " . htmlspecialchars($row['comment']) . "<br>";
}
?>
