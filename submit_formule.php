<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Get Data from the Form and Sanitize Input
    $package_id = mysqli_real_escape_string($conn, $_POST['package']);
    $type_id = mysqli_real_escape_string($conn, $_POST['type']); // Get type_id
    $date_depart = mysqli_real_escape_string($conn, $_POST['date_depart']); 
    $date_retour = mysqli_real_escape_string($conn, $_POST['date_retour']);
    $statut = mysqli_real_escape_string($conn, $_POST['statut']);
    $duree_sejour = mysqli_real_escape_string($conn, $_POST['duree_sejour']);
    $prix_chambre_quadruple = mysqli_real_escape_string($conn, $_POST['prix_chambre_quadruple']);
    $prix_chambre_triple = mysqli_real_escape_string($conn, $_POST['prix_chambre_triple']);
    $prix_chambre_double = mysqli_real_escape_string($conn, $_POST['prix_chambre_double']);
    $prix_chambre_single = mysqli_real_escape_string($conn, $_POST['prix_chambre_single']);
    $child_discount = mysqli_real_escape_string($conn, $_POST['child_discount']);
    $prix_bebe = mysqli_real_escape_string($conn, $_POST['prix_bebe']);
    $prix_chambre_quadruple_promo = isset($_POST['prix_chambre_quadruple_promo']) && $_POST['prix_chambre_quadruple_promo'] !== '' ? mysqli_real_escape_string($conn, $_POST['prix_chambre_quadruple_promo']) : 0;
    $prix_chambre_triple_promo = isset($_POST['prix_chambre_triple_promo']) && $_POST['prix_chambre_triple_promo'] !== '' ? mysqli_real_escape_string($conn, $_POST['prix_chambre_triple_promo']) : 0;
    $prix_chambre_double_promo = isset($_POST['prix_chambre_double_promo']) && $_POST['prix_chambre_double_promo'] !== '' ? mysqli_real_escape_string($conn, $_POST['prix_chambre_double_promo']) : 0;
    $prix_chambre_single_promo = isset($_POST['prix_chambre_single_promo']) && $_POST['prix_chambre_single_promo'] !== '' ? mysqli_real_escape_string($conn, $_POST['prix_chambre_single_promo']) : 0;

    // Get selected programs and encode as JSON
    $selected_programs = isset($_POST['programs']) ? $_POST['programs'] : [];
    $programs_json = json_encode($selected_programs);

    // 2. Input Validation 
    // ... (Your input validation logic) ...

    // 3. Prepare and Execute the SQL INSERT Query
    $sql_formule = "INSERT INTO formules (package_id, type_id, date_depart, date_retour, statut, duree_sejour, prix_chambre_quadruple, prix_chambre_triple, prix_chambre_double, prix_chambre_single, child_discount, prix_bebe, prix_chambre_quadruple_promo, prix_chambre_triple_promo, prix_chambre_double_promo, prix_chambre_single_promo, programs_id)
        VALUES ('$package_id', '$type_id', '$date_depart', '$date_retour', '$statut', '$duree_sejour', '$prix_chambre_quadruple', '$prix_chambre_triple', '$prix_chambre_double', '$prix_chambre_single', '$child_discount', '$prix_bebe', '$prix_chambre_quadruple_promo', '$prix_chambre_triple_promo', '$prix_chambre_double_promo', '$prix_chambre_single_promo', '$programs_json')";

    if (mysqli_query($conn, $sql_formule)) {
        $formule_id = mysqli_insert_id($conn);

        // Retrieve Hébergement data
        $date_checkin = $_POST['date_checkin'];
        $date_checkout = $_POST['date_checkout'];
        $hotel = $_POST['hotel'];
        $type_pension = $_POST['type_pension'];
        $nombre_nuit = $_POST['nombre_nuit'];

        // Insert into hebergement table for each Hébergement block
        for ($i = 0; $i < count($date_checkin); $i++) {
            $date_checkin_value = mysqli_real_escape_string($conn, $date_checkin[$i]);
            $date_checkout_value = mysqli_real_escape_string($conn, $date_checkout[$i]);
            $hotel_value = mysqli_real_escape_string($conn, $hotel[$i]);
            $type_pension_value = mysqli_real_escape_string($conn, $type_pension[$i]); //Pension
            $nombre_nuit_value = mysqli_real_escape_string($conn, $nombre_nuit[$i]);

            $sql_hebergement = "INSERT INTO hebergements (formule_id, date_checkin, date_checkout, hotel_id, type_pension, nombre_nuit) 
                                VALUES ('$formule_id', '$date_checkin_value', '$date_checkout_value', '$hotel_value', '$type_pension_value', '$nombre_nuit_value')";
            mysqli_query($conn, $sql_hebergement);
        }

        // Retrieve vol data
        $ville_depart = $_POST['ville_depart'];
        $compagnie_aerienne = $_POST['compagnie_aerienne'];
        $num_vol = $_POST['num_vol'];
        $airport_depart = $_POST['airport_depart'];
        $heure_depart = $_POST['heure_depart'];
        $destination = $_POST['destination'];
        $airport_destination = $_POST['airport_destination'];
        $heure_arrivee = $_POST['heure_arrivee'];

        // Insert into vols table for each vol block
        for ($i = 0; $i < count($ville_depart); $i++) {
            $ville_depart_id = mysqli_real_escape_string($conn, $ville_depart[$i]);
            $compagnie_aerienne_id = mysqli_real_escape_string($conn, $compagnie_aerienne[$i]);
            $num_vol_value = mysqli_real_escape_string($conn, $num_vol[$i]);
            $airport_depart_value = mysqli_real_escape_string($conn, $airport_depart[$i]);
            $heure_depart_value = mysqli_real_escape_string($conn, $heure_depart[$i]);
            $destination_value = mysqli_real_escape_string($conn, $destination[$i]);
            $airport_destination_value = mysqli_real_escape_string($conn, $airport_destination[$i]);
            $heure_arrivee_value = mysqli_real_escape_string($conn, $heure_arrivee[$i]);

            $sql_vol = "INSERT INTO vols (formule_id, ville_depart_id, compagnie_aerienne_id, num_vol, airport_depart, heure_depart, destination, airport_destination, heure_arrivee) 
                        VALUES ('$formule_id', '$ville_depart_id', '$compagnie_aerienne_id', '$num_vol_value', '$airport_depart_value', '$heure_depart_value', '$destination_value', '$airport_destination_value', '$heure_arrivee_value')";
            mysqli_query($conn, $sql_vol);
        }

        echo "Nouvelle formule et vols ajoutés avec succès";
        header("Location: display_formules.php"); // Redirect back to the form after successful insertion
        exit;
    } else {
        echo "Erreur: " . $sql_formule . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>