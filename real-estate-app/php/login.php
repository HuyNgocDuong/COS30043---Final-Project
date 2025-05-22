<?php
session_start();
require 'db_connect.php';

$error = '';

// Handle login POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $conn->real_escape_string($_POST['email']);
  $password = hash('sha256', $_POST['password']); // For PHP 5.4 compatibility

  $query = "SELECT * FROM users WHERE email = '$email'";
  $result = $conn->query($query);

  if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if ($user['password'] === $password) {
      // Determine role
      $role = ($user['email'] === 'admin@gmail.com') ? 'admin' : 'user';

      // Set session variables
      $_SESSION['user'] = $user['name'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['role'] = $role;

      // Set localStorage and redirect to app
      echo "
      <script>
        localStorage.setItem('user_email', '" . $user['email'] . "');
        localStorage.setItem('user_name', '" . $user['name'] . "');
        localStorage.setItem('userRole', '" . $role . "'); // role for Vue admin check
        window.location.href = '../dist/index.html';
      </script>
      ";
      exit;
    } else {
      $error = "Invalid password.";
    }
  } else {
    $error = "User not found.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
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
    <h2>Login</h2>

    <?php if ($error): ?>
      <div class="msg error"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="login.php">
      <label>Email</label>
      <input type="email" name="email" required>

      <label>Password</label>
      <input type="password" name="password" required>

      <button type="submit">Login</button>
    </form>

    <div class="link">
      Not signed up? <a href="signup.php">Click here</a>
    </div>
  </div>

</body>
</html>
