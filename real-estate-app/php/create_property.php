<?php
session_start();
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if (!$data['title'] || !$data['location'] || !$data['price'] || !$data['type'] || !$data['image']) {
  echo json_encode(["error" => "Missing fields"]);
  exit;
}

$filename = '../assets/houses.json';

$houses = [];
if (file_exists($filename)) {
  $houses = json_decode(file_get_contents($filename), true);
}

$newId = count($houses) > 0 ? max(array_column($houses, 'id')) + 1 : 1;

$newProperty = [
  "id" => $newId,
  "title" => $data['title'],
  "location" => $data['location'],
  "type" => $data['type'],
  "price" => (int)$data['price'],
  "image" => $data['image'] // should be an existing filename in /assets
];

$houses[] = $newProperty;

file_put_contents($filename, json_encode($houses, JSON_PRETTY_PRINT));
echo json_encode(["success" => true, "id" => $newId]);
?>
