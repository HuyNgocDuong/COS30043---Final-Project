<?php
header("Content-Type: application/json");
require 'db_connect.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['email'], $data['password'])) {
  http_response_code(400);
  echo json_encode(["error" => "Missing required fields"]);
  exit;
}

$email = $conn->real_escape_string($data['email']);
$password = $data['password'];

$result = $conn->query("SELECT * FROM users WHERE email = '$email'");
if ($result && $result->num_rows > 0) {
  $user = $result->fetch_assoc();
  if (password_verify($password, $user['password'])) {
    echo json_encode([
      "success" => true,
      "user" => ["name" => $user['name'], "email" => $user['email']]
    ]);
  } else {
    http_response_code(401);
    echo json_encode(["error" => "Invalid credentials"]);
  }
} else {
  http_response_code(404);
  echo json_encode(["error" => "User not found"]);
}
?>
