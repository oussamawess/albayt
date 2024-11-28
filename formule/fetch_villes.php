<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../db.php';

$categoryId = $_GET['category_id'];
$query = "SELECT id, nom, category_parent_id  FROM omra_packages WHERE category_parent_id = $categoryId";
$result = mysqli_query($conn, $query);

$villes = [];
while ($row = mysqli_fetch_assoc($result)) {
    $villes[] = $row;
}

echo json_encode($villes);
?>
