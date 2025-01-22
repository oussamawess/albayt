<?php
include '../db.php';

$formuleTypeId = $_GET['formule_id'];

// $query = "
//     SELECT 
//         f.id AS formule_id, 
//         f.date_depart, 
//         f.date_retour, 
//         f.prix_chambre_quadruple,
//         f.prix_chambre_quadruple_promo,
//         c.logo AS compagnie_logo
//     FROM formules f
//     INNER JOIN vols v ON f.id = v.formule_id
//     INNER JOIN compagnies_aeriennes c ON v.compagnie_aerienne_id = c.id
//     WHERE f.type_id = $formuleTypeId
//     ORDER BY f.date_depart ASC
// ";

$query = "
    SELECT 
        f.id AS formule_id, 
        f.date_depart, 
        f.date_retour, 
        f.prix_chambre_quadruple,
        f.prix_chambre_quadruple_promo,
        c.logo AS compagnie_logo
    FROM formules f
    INNER JOIN vols v ON f.id = v.formule_id
    INNER JOIN compagnies_aeriennes c ON v.compagnie_aerienne_id = c.id
    WHERE f.type_id = $formuleTypeId
    GROUP BY f.id
    ORDER BY f.date_depart ASC
";


$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$dates = [];
while ($row = mysqli_fetch_assoc($result)) {
    // Ensure the price is numeric
    $promoPrice = $row['prix_chambre_quadruple_promo'];
    $regularPrice = $row['prix_chambre_quadruple'];

    // Check if promo price exists and is different from regular price
    if (!empty($promoPrice) && $promoPrice != "0.00" && $promoPrice != $regularPrice) {
        $row['price'] = (float) $promoPrice;  // Convert to a number
    } else {
        $row['price'] = (float) $regularPrice;  // Convert to a number
    }
    
    $dates[] = $row;
}

echo json_encode($dates);
?>
