<?php
header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set("display_errors", 1);

$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

// Use classic ternary to avoid PHP 7+ '??'
$action = isset($data['action']) ? $data['action'] : null;

if (!$action) {
  echo json_encode(array("success" => false, "error" => "Missing action"));
  exit;
}

switch ($action) {
  case 'delete':
    // Again, avoid '??'
    $id = isset($data['id']) ? $data['id'] : null;
    deleteProperty($id);
    break;

  default:
    echo json_encode(array("success" => false, "error" => "Unknown action"));
    break;
}

function deleteProperty($id) {
  if (!$id) {
    echo json_encode(array("success" => false, "error" => "Missing property ID"));
    return;
  }

  $file = __DIR__ . '/houses.json';
  if (!file_exists($file)) {
    echo json_encode(array("success" => false, "error" => "File not found"));
    return;
  }

  $houses = json_decode(file_get_contents($file), true);

  // Use foreach to filter manually 
  $updated = array();
  foreach ($houses as $house) {
    if (intval($house['id']) !== intval($id)) {
      $updated[] = $house;
    }
  }

  $saved = file_put_contents($file, json_encode($updated, JSON_PRETTY_PRINT));
  if ($saved === false) {
    echo json_encode(array("success" => false, "error" => "Failed to save file"));
  } else {
    echo json_encode(array("success" => true));
  }
}
?>
