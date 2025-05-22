<?php
require 'db_connect.php';

$success = '';
$error = '';

// Create table if it doesn't exist
$conn->query("
  CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  )
");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = hash('sha256', $_POST['password']); // PHP 5.4 compatible

    $check = $conn->query("SELECT id FROM users WHERE email = '$email'");
    if ($check && $check->num_rows > 0) {
      $error = "Email already registered.";
    } else {
      $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
      if ($conn->query($sql)) {
        $success = "Signup successful!";
      } else {
        $error = "Database error: " . $conn->error;
      }
    }
  } else {
    $error = "Please fill in all fields.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Signup</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #ffe2e2, #fad0c4);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-container {
      background: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
      width: 400px;
    }

    h2 {
      margin-bottom: 20px;
      color: #6a1b9a;
      font-weight: bold;
      text-align: center;
    }

    label {
      display: block;
      margin: 10px 0 5px;
      font-weight: 500;
    }

    input {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 25px;
      margin-bottom: 15px;
      outline: none;
    }

    button {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 25px;
      background: linear-gradient(to right, #ff512f, #dd2476);
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s ease;
    }

    button:hover {
      opacity: 0.9;
    }

    .msg {
      margin-bottom: 15px;
      padding: 10px;
      border-radius: 8px;
    }

    .success {
      background-color: #d4edda;
      color: #155724;
    }

    .error {
      background-color: #f8d7da;
      color: #721c24;
    }

    .link {
      margin-top: 15px;
      text-align: center;
      font-size: 14px;
    }

    .link a {
      color: #6a1b9a;
      text-decoration: none;
      font-weight: bold;
    }

    .link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>Sign Up</h2>

    <?php if ($success): ?>
      <div class="msg success"><?php echo $success; ?></div>
    <?php elseif ($error): ?>
      <div class="msg error"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="signup.php">
      <label>Name</label>
      <input type="text" name="name" required>

      <label>Email</label>
      <input type="email" name="email" required>

      <label>Password</label>
      <input type="password" name="password" required>

      <button type="submit">Sign Up</button>
    </form>

    <div class="link">
      Already signed up? <a href="login.php">Click here to log in</a>.
    </div>
  </div>

</body>
</html>
