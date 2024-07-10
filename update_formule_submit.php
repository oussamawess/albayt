<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Get Data from the Form and Sanitize Input
    $formule_id = mysqli_real_escape_string($conn, $_POST['formule_id']);
    $package_id = mysqli_real_escape_string($conn, $_POST['package']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $statut = mysqli_real_escape_string($conn, $_POST['statut']);
    $duree_sejour = mysqli_real_escape_string($conn, $_POST['duree_sejour']);
    $ville_depart_id = mysqli_real_escape_string($conn, $_POST['ville_depart']);
    $compagnie_aerienne_id = mysqli_real_escape_string($conn, $_POST['compagnie_aerienne']);
    $num_vol = mysqli_real_escape_string($conn, $_POST['num_vol']);
    $airport_depart = mysqli_real_escape_string($conn, $_POST['airport_depart']);
    $heure_depart = mysqli_real_escape_string($conn, $_POST['heure_depart']);
    $destination = mysqli_real_escape_string($conn, $_POST['destination']);
    $airport_destination = mysqli_real_escape_string($conn, $_POST['airport_destination']);
    $heure_arrivee = mysqli_real_escape_string($conn, $_POST['heure_arrivee']);
    $date_checkin1 = mysqli_real_escape_string($conn, $_POST['date_checkin1']);
    $date_checkout1 = mysqli_real_escape_string($conn, $_POST['date_checkout1']);
    $hotel1_id = mysqli_real_escape_string($conn, $_POST['hotel']);
    $nombre_nuit1 = mysqli_real_escape_string($conn, $_POST['nombre_nuit']);
    // $date_checkin2 = mysqli_real_escape_string($conn, $_POST['date_checkin2']);
    // $date_checkout2 = mysqli_real_escape_string($conn, $_POST['date_checkout2']);
    // $hotel2_id = mysqli_real_escape_string($conn, $_POST['hotel2']);
    // $nombre_nuit2 = mysqli_real_escape_string($conn, $_POST['nombre_nuit']);
    $prix_chambre_quadruple = mysqli_real_escape_string($conn, $_POST['prix_chambre_quadruple']);
    $prix_chambre_triple = mysqli_real_escape_string($conn, $_POST['prix_chambre_triple']);
    $prix_chambre_double = mysqli_real_escape_string($conn, $_POST['prix_chambre_double']);
    $prix_chambre_single = mysqli_real_escape_string($conn, $_POST['prix_chambre_single']);
    $child_discount = mysqli_real_escape_string($conn, $_POST['child_discount']);
    $prix_bebe = mysqli_real_escape_string($conn, $_POST['prix_bebe']);
    $prix_chambre_quadruple_promo = mysqli_real_escape_string($conn, $_POST['prix_chambre_quadruple_promo']);
    $prix_chambre_triple_promo = mysqli_real_escape_string($conn, $_POST['prix_chambre_triple_promo']);
    $prix_chambre_double_promo = mysqli_real_escape_string($conn, $_POST['prix_chambre_double_promo']);
    $prix_chambre_single_promo = mysqli_real_escape_string($conn, $_POST['prix_chambre_single_promo']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);


    // 2. Input Validation (Example - Check if all price fields are valid numbers)
    $priceFields = [
        'prix_chambre_quadruple', 'prix_chambre_triple', 'prix_chambre_double',
        'prix_chambre_single', 'child_discount', 'prix_bebe',
        'prix_chambre_quadruple_promo', 'prix_chambre_triple_promo', 'prix_chambre_double_promo',
        'prix_chambre_single_promo'
    ];

    foreach ($priceFields as $field) {
        if (!is_numeric($$field) || $$field < 0) { // Use variable variables to check the value
            echo "Erreur: Le champ $field doit être un nombre positif.";
            exit; 
        }
    }
    
    // ... (Add validation for other inputs: dates, text fields, etc. as needed)

    // 3. Prepare and Execute the SQL UPDATE Query
    $sql = "UPDATE formules SET 
            package_id = '$package_id', 
            nom = '$nom',
            statut = '$statut',
            duree_sejour = '$duree_sejour',
            ville_depart_id = '$ville_depart_id',
            compagnie_aerienne_id = '$compagnie_aerienne_id',
            num_vol = '$num_vol',
            airport_depart = '$airport_depart',
            heure_depart = '$heure_depart',
            destination = '$destination',
            airport_destination = '$airport_destination',
            heure_arrivee = '$heure_arrivee',
            date_checkin1 = '$date_checkin1',
            date_checkout1 = '$date_checkout1',
            hotel1_id = '$hotel1_id',
            nombre_nuit1 = '$nombre_nuit1',
            -- date_checkin2 = '$date_checkin2',
            -- date_checkout2 = '$date_checkout2',
            -- hotel2_id = '$hotel2_id',
            -- nombre_nuit2 = '$nombre_nuit2',
            prix_chambre_quadruple = '$prix_chambre_quadruple',
            prix_chambre_triple = '$prix_chambre_triple',
            prix_chambre_double = '$prix_chambre_double',
            prix_chambre_single = '$prix_chambre_single',
            child_discount = '$child_discount',
            prix_bebe = '$prix_bebe',
            prix_chambre_quadruple_promo = '$prix_chambre_quadruple_promo',
            prix_chambre_triple_promo = '$prix_chambre_triple_promo',
            prix_chambre_double_promo = '$prix_chambre_double_promo',
            prix_chambre_single_promo = '$prix_chambre_single_promo',
            description = '$description'
            WHERE id = $formule_id";


    if (mysqli_query($conn, $sql)) {
        echo "Formule mise à jour avec succès";
        header("Location: omrapackage.php"); // Refresh the page to show updated data
        exit;
    } else {
        echo "Erreur lors de la mise à jour : " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
