<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Get Data from the Form and Sanitize Input
    $package_id = mysqli_real_escape_string($conn, $_POST['package']);
    $type_id = mysqli_real_escape_string($conn, $_POST['type']); // Get type_id
    $statut = mysqli_real_escape_string($conn, $_POST['statut']);
    $duree_sejour = mysqli_real_escape_string($conn, $_POST['duree_sejour']);
    $date_checkin1 = mysqli_real_escape_string($conn, $_POST['date_checkin1']);
    $date_checkout1 = mysqli_real_escape_string($conn, $_POST['date_checkout1']);
    $hotel1_id = mysqli_real_escape_string($conn, $_POST['hotel']);
    $nombre_nuit1 = mysqli_real_escape_string($conn, $_POST['nombre_nuit']);
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

    // 2. Input Validation 
    // ... (Your input validation logic) ...

    // 3. Prepare and Execute the SQL INSERT Query
    $sql_formule = "INSERT INTO formules (package_id, type_id, statut, duree_sejour, date_checkin1, date_checkout1, hotel1_id, nombre_nuit1, prix_chambre_quadruple, prix_chambre_triple, prix_chambre_double, prix_chambre_single, child_discount, prix_bebe, prix_chambre_quadruple_promo, prix_chambre_triple_promo, prix_chambre_double_promo, prix_chambre_single_promo, description)
        VALUES ('$package_id', '$type_id', '$statut', '$duree_sejour', '$date_checkin1', '$date_checkout1', '$hotel1_id', '$nombre_nuit1', '$prix_chambre_quadruple', '$prix_chambre_triple', '$prix_chambre_double', '$prix_chambre_single', '$child_discount', '$prix_bebe', '$prix_chambre_quadruple_promo', '$prix_chambre_triple_promo', '$prix_chambre_double_promo', '$prix_chambre_single_promo', '$description')";

    if (mysqli_query($conn, $sql_formule)) {
        $formule_id = mysqli_insert_id($conn);

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
            $num_vol = mysqli_real_escape_string($conn, $num_vol[$i]);
            $airport_depart = mysqli_real_escape_string($conn, $airport_depart[$i]);
            $heure_depart = mysqli_real_escape_string($conn, $heure_depart[$i]);
            $destination = mysqli_real_escape_string($conn, $destination[$i]);
            $airport_destination = mysqli_real_escape_string($conn, $airport_destination[$i]);
            $heure_arrivee = mysqli_real_escape_string($conn, $heure_arrivee[$i]);

            $sql_vol = "INSERT INTO vols (formule_id, ville_depart_id, compagnie_aerienne_id, num_vol, airport_depart, heure_depart, destination, airport_destination, heure_arrivee) 
                        VALUES ('$formule_id', '$ville_depart_id', '$compagnie_aerienne_id', '$num_vol', '$airport_depart', '$heure_depart', '$destination', '$airport_destination', '$heure_arrivee')";
            mysqli_query($conn, $sql_vol);
        }

        echo "Nouvelle formule et vols ajoutés avec succès";
        header("Location: omrapackage.php"); // Redirect back to the form after successful insertion
        exit;
    } else {
        echo "Erreur: " . $sql_formule . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
