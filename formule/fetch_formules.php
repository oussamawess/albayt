<?php
include '../db.php';

$villeId = $_GET['ville_id'];
$query = "SELECT id, nom, formule_parent_id FROM type_formule_omra WHERE formule_parent_id = $villeId";
$result = mysqli_query($conn, $query);

$formules = [];
while ($row = mysqli_fetch_assoc($result)) {
    $formules[] = $row;
}

echo json_encode($formules);
?>
