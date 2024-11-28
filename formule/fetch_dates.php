<?php
include '../db.php';

$formuleTypeId = $_GET['formule_id'];

// Query to fetch data from `formules` and join with `vols` and `compagnie_aeriennes` to get the logo
$query = "
    SELECT 
        f.id AS formule_id, 
        f.type_id, 
        f.date_depart, 
        f.date_retour, 
        f.prix_chambre_quadruple,
        c.logo AS compagnie_logo  -- Logo from compagnies_aeriennes
    FROM formules f
    INNER JOIN vols v ON f.id = v.formule_id  -- Join on the vols table to get compagnie_aerienne_id
    INNER JOIN compagnies_aeriennes c ON v.compagnie_aerienne_id = c.id  -- Join on the compagnies_aeriennes table to get the logo
    WHERE f.type_id = $formuleTypeId
    GROUP BY f.id  -- Group by formule_id to fetch unique records
    ORDER BY f.date_depart ASC  -- Order by date_depart in ascending order (oldest first)
";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));  // Log SQL errors if any
}

$dates = [];
while ($row = mysqli_fetch_assoc($result)) {
    $dates[] = $row;  // Collect each result in an array
}

// Log the response to check for duplicates
error_log("Fetched Dates: " . print_r($dates, true));  // Use this to log the fetched data

// Return the data as JSON
echo json_encode($dates);
?>
