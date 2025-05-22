<?php
// Enable full error visibility
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = $_POST;

  // Required fields
  $required = ['title', 'location', 'type', 'price', 'image'];
  foreach ($required as $field) {
    if (empty($data[$field])) {
      echo "? Missing field: $field";
      exit;
    }
  }

$filename = __DIR__ . '/houses.json';
  $houses = [];

  if (file_exists($filename)) {
    $houses = json_decode(file_get_contents($filename), true);
  }

  // Mercury-safe replacement for array_column
  $ids = array();
  foreach ($houses as $h) {
    $ids[] = isset($h['id']) ? $h['id'] : 0;
  }
  $newId = count($ids) > 0 ? max($ids) + 1 : 1;

  // New property
  $newProperty = [
    "id" => $newId,
    "title" => $data['title'],
    "location" => $data['location'],
    "type" => $data['type'],
    "price" => (int)$data['price'],
    "image" => $data['image']
  ];

  $houses[] = $newProperty;

  // Save to JSON
  if (file_put_contents($filename, json_encode($houses, JSON_PRETTY_PRINT))) {
    echo "<p>? Property added successfully!</p>";
    echo "<a href='https://mercury.swin.edu.au/cos30043/s104471956/FinalProject/dist/index.html#/manage-listings'>? Back to Listings</a>";
    exit;
  } else {
    echo "? Failed to write to JSON file.";
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Property</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      max-width: 600px;
      margin: 40px auto;
      background-color: #f8f9fa;
    }

    h2 {
      text-align: center;
      color: #333;
    }

    form {
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
    }

    form input,
    form select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    button {
      background-color: #28a745;
      color: white;
      padding: 10px 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      background-color: #218838;
    }

    a {
      display: block;
      text-align: center;
      margin-top: 20px;
      text-decoration: none;
      color: #007bff;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <h2>Add New Property</h2>
  <form method="POST">
    <input type="text" name="title" placeholder="Title" required>
    
    <select name="location" required>
      <option value="">Select Location</option>
      <option>Melbourne</option>
      <option>Sydney</option>
      <option>Brisbane</option>
    </select>

    <select name="type" required>
      <option value="">Select Type</option>
      <option>Villa</option>
      <option>Apartment</option>
      <option>House</option>
    </select>

    <input type="number" name="price" placeholder="Price (e.g., 450000)" required>
    <input type="text" name="image" placeholder="Image filename (e.g., house1.png)" required>

    <button type="submit">Add Property</button>
  </form>
</body>
</html>
