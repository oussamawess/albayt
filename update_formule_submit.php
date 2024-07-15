<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get Data from the Form and Sanitize Input
    $formule_id = mysqli_real_escape_string($conn, $_POST['formule_id']);
    $package_id = mysqli_real_escape_string($conn, $_POST['package']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $statut = mysqli_real_escape_string($conn, $_POST['statut']);
    $duree_sejour = mysqli_real_escape_string($conn, $_POST['duree_sejour']);
    $typeId = intval($_POST['type']);
    $date_depart = mysqli_real_escape_string($conn, $_POST['date_depart']);
    // wess
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
    //wess

    $description = mysqli_real_escape_string($conn, $_POST['description']);
    // (Other fields...)

    //wess
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
    //wess

    // Update the main formules table
    $sql = "UPDATE formules SET 
            package_id = '$package_id', 
            nom = '$nom',
            statut = '$statut',
            duree_sejour = '$duree_sejour',
            type_id = $typeId,
            date_depart = '$date_depart',
            -- wess
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
            -- wess
            description = '$description'
            -- (Other fields...)
            WHERE id = $formule_id";

    if (!mysqli_query($conn, $sql)) {
        echo "Erreur lors de la mise à jour : " . mysqli_error($conn);
        exit;
    }

    // Delete existing vols entries for this formule
    $deleteSql = "DELETE FROM vols WHERE formule_id = $formule_id";
    if (!mysqli_query($conn, $deleteSql)) {
        echo "Erreur lors de la suppression des vols existants : " . mysqli_error($conn);
        exit;
    }

    // Insert new vols entries
    foreach ($_POST['vols'] as $vol) {
        $ville_depart_id = mysqli_real_escape_string($conn, $vol['ville_depart']);
        $compagnie_aerienne_id = mysqli_real_escape_string($conn, $vol['compagnie_aerienne']);
        $num_vol = mysqli_real_escape_string($conn, $vol['num_vol']);
        $airport_depart = mysqli_real_escape_string($conn, $vol['airport_depart']);
        $heure_depart = mysqli_real_escape_string($conn, $vol['heure_depart']);
        $destination = mysqli_real_escape_string($conn, $vol['destination']);
        $airport_destination = mysqli_real_escape_string($conn, $vol['airport_destination']);
        $heure_arrivee = mysqli_real_escape_string($conn, $vol['heure_arrivee']);

        $insertSql = "INSERT INTO vols (formule_id, ville_depart_id, compagnie_aerienne_id, num_vol, airport_depart, heure_depart, destination, airport_destination, heure_arrivee) 
                      VALUES ('$formule_id', '$ville_depart_id', '$compagnie_aerienne_id', '$num_vol', '$airport_depart', '$heure_depart', '$destination', '$airport_destination', '$heure_arrivee')";

        if (!mysqli_query($conn, $insertSql)) {
            echo "Erreur lors de l'insertion des vols : " . mysqli_error($conn);
            exit;
        }
    }

    // Delete existing hebergements entries for this formule
    $deleteSql = "DELETE FROM hebergements WHERE formule_id = $formule_id";
    if (!mysqli_query($conn, $deleteSql)) {
        echo "Erreur lors de la suppression des hébergements existants : " . mysqli_error($conn);
        exit;
    }

    // Insert new hebergements entries
    foreach ($_POST['hebergements'] as $hebergement) {
        $hotel_id = mysqli_real_escape_string($conn, $hebergement['hotel_id']);
        $date_checkin = mysqli_real_escape_string($conn, $hebergement['date_checkin']);
        $date_checkout = mysqli_real_escape_string($conn, $hebergement['date_checkout']);
        $nombre_nuit = mysqli_real_escape_string($conn, $hebergement['nombre_nuit']);
        $type_pension = mysqli_real_escape_string($conn, $hebergement['type_pension']);

        $insertSql = "INSERT INTO hebergements (formule_id, hotel_id, date_checkin, date_checkout, type_pension, nombre_nuit) 
                      VALUES ('$formule_id', '$hotel_id', '$date_checkin', '$date_checkout', '$type_pension', '$nombre_nuit')";

        if (!mysqli_query($conn, $insertSql)) {
            echo "Erreur lors de l'insertion des hébergements : " . mysqli_error($conn);
            exit;
        }
    }

    echo "Formule mise à jour avec succès";
    header("Location: omrapackage.php"); // Redirect to a success page
    exit;
}

mysqli_close($conn);
?>
