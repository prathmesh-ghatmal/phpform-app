<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Contact Us</h2>

    <?php
      if (isset($_GET['success'])) {
        echo "<p class='success'>✅ Message sent successfully!</p>";
      } elseif (isset($_GET['error'])) {
        echo "<p class='error'>❌ Please fill in all fields correctly.</p>";
      }
    ?>

    <form action="process.php" method="POST" onsubmit="return validateForm()">
      <label for="name">Full Name:</label>
      <input type="text" id="name" name="name" placeholder="Enter your name">

      <label for="email">Email Address:</label>
      <input type="email" id="email" name="email" placeholder="Enter your email">

      <label for="message">Message:</label>
      <textarea id="message" name="message" placeholder="Write your message..."></textarea>

      <button type="submit">Send Message</button>
    </form>
  </div>

  <script>
    function validateForm() {
      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const message = document.getElementById("message").value.trim();
      const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

      if (name === "" || email === "" || message === "") {
        alert("All fields are required!");
        return false;
      }
      if (!email.match(emailPattern)) {
        alert("Please enter a valid email address!");
        return false;
      }
      return true;
    }
  </script>
</body>
</html>
