<?php
// Vulnerable code: SQL Injection
$conn = new mysqli("localhost", "root", "", "mydb");

if (isset($_GET['user'])) {
    $user = $_GET['user'];
    $sql = "SELECT * FROM users WHERE username = '$user'"; // VULNERABLE!
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        echo "Hello, " . $row['username'];
    }
}
?>

