<?php
require __DIR__ . '/vendor/autoload.php';  // Load Composer packages

use Dotenv\Dotenv;

// Load environment variables from .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Fetch DB credentials from .env
$servername = $_ENV['DB_HOST'];
$username   = $_ENV['DB_USER'];
$password   = $_ENV['DB_PASS'];
$dbname     = $_ENV['DB_NAME'];
// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Get and validate inputs
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$message = trim($_POST['message']);

if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: index.php?error=1");
    exit();
}

// Insert into DB
$stmt = $conn->prepare("INSERT INTO submissions (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    header("Location: index.php?success=1");
} else {
    header("Location: index.php?error=1");
}

$stmt->close();
$conn->close();
?>
