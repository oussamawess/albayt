<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../db.php';

$query = "SELECT id, nom FROM category_parent";
$result = $conn->query($query);

if (!$result) {
    echo json_encode(["error" => $conn->error]);
    exit;
}

$categories = [];
while ($row = $result->fetch_assoc()) {
    $categories[] = $row;
}

echo json_encode($categories);
?>
