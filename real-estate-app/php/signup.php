<?php
header("Content-Type: application/json");
require 'db_connect.php';

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

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['name'], $data['email'], $data['password'])) {
  http_response_code(400);
  echo json_encode(["error" => "Missing required fields"]);
  exit;
}

$name = $conn->real_escape_string($data['name']);
$email = $conn->real_escape_string($data['email']);
$password = password_hash($data['password'], PASSWORD_DEFAULT);

// Check if email already exists
$check = $conn->query("SELECT id FROM users WHERE email = '$email'");
if ($check && $check->num_rows > 0) {
  http_response_code(409);
  echo json_encode(["error" => "Email already registered"]);
  exit;
}

// Insert user
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
if ($conn->query($sql)) {
  echo json_encode(["success" => true]);
} else {
  http_response_code(500);
  echo json_encode(["error" => $conn->error]);
}
?>
