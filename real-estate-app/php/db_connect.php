<?php
    $host = "feenix-mariadb.swin.edu.au";
    $user = "s104471956";
    $pwd = "2882005";
    $sql_db = "s104471956_db";

$conn = new mysqli($host, $user, $pwd, $sql_db);

if ($conn->connect_error) {
  die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}
?>

