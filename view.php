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
$conn = new mysqli($servername, $username, $password, $dbname);
$result = $conn->query("SELECT * FROM submissions ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Submitted Data</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>All Submissions</h2>
    <table border="1" cellpadding="10" style="width:100%; margin-top:20px;">
      <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Date</th>
      </tr>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['message']) ?></td>
        <td><?= $row['created_at'] ?></td>
      </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>
