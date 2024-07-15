<?php
include 'db.php';

if (isset($_GET['package_id'])) {
    $packageId = intval($_GET['package_id']);
    $sql = "SELECT id, nom FROM type_formule_omra WHERE formule_parent_id = $packageId";
    $result = mysqli_query($conn, $sql);

    $types = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $types[] = $row;
    }
    echo json_encode($types);
}
?>
