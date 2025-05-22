<?php
session_start();
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? null;

if (!$id) {
  echo json_encode(["error" => "Missing property ID"]);
  exit;
}

$filename = '../assets/houses.json';
if (!file_exists($filename)) {
  echo json_encode(["error" => "houses.json not found"]);
  exit;
}

$houses = json_decode(file_get_contents($filename), true);
$houses = array_filter($houses, fn($h) => $h['id'] != $id);

file_put_contents($filename, json_encode(array_values($houses), JSON_PRETTY_PRINT));
echo json_encode(["success" => true]);
?>
