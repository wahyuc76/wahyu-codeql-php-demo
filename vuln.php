<?php
// Kerentanan: SQL Injection
$conn = new mysqli("localhost", "root", "", "testdb");
$id = $_GET['id']; // Input tidak disanitasi
$query = "SELECT * FROM users WHERE id = $id"; // <-- Rentan SQLi
$result = $conn->query($query);
while ($row = $result->fetch_assoc()) {
    echo $row['username'] . "<br>";
}

// Kerentanan: Cross Site Scripting (XSS)
$name = $_GET['name'];
echo "Halo, $name!"; // <-- Tidak divalidasi

// Kerentanan: Command Injection
$ip = $_GET['ip'];
system("ping -c 1 " . $ip); // <-- Rentan command injection

// Kerentanan: Path Traversal
$file = $_GET['file'];
include("uploads/" . $file); // <-- Tidak dicek, bisa akses ../../etc/passwd

// Kerentanan: Insecure Cookie
setcookie("user", "admin", time() + 3600); // <-- Tanpa HttpOnly atau Secure flag

// Kerentanan: Penggunaan fungsi deprecated
$datetime = split(":", "12:30:45"); // <-- split() deprecated di PHP 7+

// Kerentanan: Hardcoded credentials
$dbUser = "root";
$dbPass = "supersecretpassword"; // <-- Jangan hardcode credentials

// Kerentanan: Hash tanpa salt
$password = $_POST['password'];
$hash = md5($password); // <-- md5 lemah dan tidak ada salt
echo "Password hash: $hash";

?>

