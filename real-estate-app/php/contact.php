<?php
require 'db_connect.php';

$success = '';
$error = '';

// Create table if not exists
$conn->query("
  CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(50),
    property VARCHAR(255),
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  )
");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim($conn->real_escape_string($_POST['name']));
  $email = trim($conn->real_escape_string($_POST['email']));
  $phone = trim($conn->real_escape_string($_POST['phone']));
  $property = trim($conn->real_escape_string($_POST['property']));
  $message = trim($conn->real_escape_string($_POST['message']));

  // Server-side validation
  if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
    $error = "Name must contain letters and spaces only.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Invalid email format.";
  } elseif (!empty($phone) && !preg_match("/^[0-9]{8,15}$/", $phone)) {
    $error = "Phone number must be 8 to 15 digits.";
  } elseif (empty($message)) {
    $error = "Message cannot be empty.";
  } else {
    $sql = "INSERT INTO contact_messages (name, email, phone, property, message)
            VALUES ('$name', '$email', '$phone', '$property', '$message')";
    if ($conn->query($sql)) {
      $success = "Your message has been sent!";
    } else {
      $error = "Database error: " . $conn->error;
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Contact Us</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #ffe2e2, #fad0c4);
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .contact-wrapper {
      display: flex;
      max-width: 1200px;
      width: 100%;
      gap: 40px;
      padding: 40px;
    }

    .form-section {
      flex: 1;
    }

    .form-section h2 {
      color: #6a1b9a;
      margin-bottom: 30px;
      font-weight: bold;
    }

    .form-section h2::after {
      content: '';
      display: block;
      width: 40px;
      height: 3px;
      background: #6a1b9a;
      margin-top: 8px;
    }

    .back-link {
      display: inline-block;
      margin-bottom: 20px;
      text-decoration: none;
      color: #6a1b9a;
      font-weight: bold;
      font-size: 14px;
      transition: color 0.2s ease;
    }

    .back-link:hover {
      color: #ff512f;
    }

    form {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 25px 30px; /* 25px row gap, 30px column gap */
      align-items: center;
    }

    form textarea {
      grid-column: span 2;
      padding: 12px;
      border-radius: 25px;
      border: 1px solid #ccc;
      resize: vertical;
      height: 120px;
    }

    input {
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 25px;
      width: 100%;
      box-sizing: border-box;
    }

    input:invalid {
      border-color: #e57373;
    }

    button {
      grid-column: span 2;
      padding: 12px;
      border: none;
      border-radius: 25px;
      background: linear-gradient(to right, #ff512f, #dd2476);
      color: white;
      font-weight: bold;
      cursor: pointer;
      width: 150px;
    }

    button:hover {
      opacity: 0.9;
    }

    .image-section {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .image-section img {
      max-width: 100%;
    }

    .msg {
      grid-column: span 2;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 10px;
    }

    .success {
      background-color: #d4edda;
      color: #155724;
    }

    .error {
      background-color: #f8d7da;
      color: #721c24;
    }

    @media (max-width: 768px) {
      .contact-wrapper {
        flex-direction: column;
        align-items: center;
        padding: 20px;
      }

      form {
        grid-template-columns: 1fr;
      }

      button {
        width: 100%;
      }
    }
  </style>
</head>
<body>

<div class="contact-wrapper">
  <div class="form-section">
    <a href="../dist/index.html" class="back-link">? Back to Website</a>
    <h2>Get in touch</h2>

    <?php if ($success): ?>
      <div class="msg success"><?php echo $success; ?></div>
    <?php elseif ($error): ?>
      <div class="msg error"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="contact.php">
      <input type="text" name="name" placeholder="Your Name" required pattern="[A-Za-z\s]+" title="Letters and spaces only">
      <input type="email" name="email" placeholder="Your Email" required>
      <input type="text" name="phone" placeholder="Phone Number" pattern="[0-9]{8,15}" title="Enter 8 to 15 digits">
      <input type="text" name="property" placeholder="Interested Property">
      <textarea name="message" placeholder="Your Message" required></textarea>
      <button type="submit">Submit ?</button>
    </form>
  </div>

  <div class="image-section">
    <img src="right_img.png" alt="Contact Illustration" />
  </div>
</div>

</body>
</html>
