<?php
header("Content-Type: application/json");

$filename = '../assets/houses.json';

if (file_exists($filename)) {
  $json = file_get_contents($filename);
  echo $json;
} else {
  echo json_encode([]);
}
?>
