<?php
include 'db.php'; // Include your database connection file

// Check if the ID is provided in the URL
if (isset($_GET['id'])) {
    $formule_id = $_GET['id'];

    // Fetch the original formule data
    $sql_fetch_formule = "SELECT * FROM formules WHERE id = $formule_id";
    $result_fetch_formule = mysqli_query($conn, $sql_fetch_formule);

    if (mysqli_num_rows($result_fetch_formule) > 0) {
        $row_formule = mysqli_fetch_assoc($result_fetch_formule);

        // Prepare the data for duplication
        $package_id = $row_formule['package_id'];
        $type_id = $row_formule['type_id'];
        $date_depart = $row_formule['date_depart'];
        $statut = 'désactivé';
        $duree_sejour = $row_formule['duree_sejour'];
        $prix_chambre_quadruple = $row_formule['prix_chambre_quadruple'];
        $prix_chambre_triple = $row_formule['prix_chambre_triple'];
        $prix_chambre_double = $row_formule['prix_chambre_double'];
        $prix_chambre_single = $row_formule['prix_chambre_single'];
        $child_discount = $row_formule['child_discount'];
        $prix_bebe = $row_formule['prix_bebe'];
        $prix_chambre_quadruple_promo = $row_formule['prix_chambre_quadruple_promo'];
        $prix_chambre_triple_promo = $row_formule['prix_chambre_triple_promo'];
        $prix_chambre_double_promo = $row_formule['prix_chambre_double_promo'];
        $prix_chambre_single_promo = $row_formule['prix_chambre_single_promo'];
        $description = $row_formule['description'];

        // Insert the duplicated formule as a new record
        $sql_insert_formule = "INSERT INTO formules (package_id, type_id, date_depart, statut, duree_sejour, prix_chambre_quadruple, prix_chambre_triple, prix_chambre_double, prix_chambre_single, child_discount, prix_bebe, prix_chambre_quadruple_promo, prix_chambre_triple_promo, prix_chambre_double_promo, prix_chambre_single_promo, description)
            VALUES ('$package_id', '$type_id', '$date_depart', '$statut', '$duree_sejour', '$prix_chambre_quadruple', '$prix_chambre_triple', '$prix_chambre_double', '$prix_chambre_single', '$child_discount', '$prix_bebe', '$prix_chambre_quadruple_promo', '$prix_chambre_triple_promo', '$prix_chambre_double_promo', '$prix_chambre_single_promo', '$description')";

        if (mysqli_query($conn, $sql_insert_formule)) {
            $new_formule_id = mysqli_insert_id($conn);

            // Duplicate hebergements related to the formule
            $sql_fetch_hebergements = "SELECT * FROM hebergements WHERE formule_id = $formule_id";
            $result_fetch_hebergements = mysqli_query($conn, $sql_fetch_hebergements);
            while ($row_hebergement = mysqli_fetch_assoc($result_fetch_hebergements)) {
                $date_checkin = $row_hebergement['date_checkin'];
                $date_checkout = $row_hebergement['date_checkout'];
                $hotel_id = $row_hebergement['hotel_id'];
                $type_pension = $row_hebergement['type_pension'];
                $nombre_nuit = $row_hebergement['nombre_nuit'];

                $sql_insert_hebergement = "INSERT INTO hebergements (formule_id, date_checkin, date_checkout, hotel_id, type_pension, nombre_nuit)
                    VALUES ('$new_formule_id', '$date_checkin', '$date_checkout', '$hotel_id', '$type_pension', '$nombre_nuit')";
                mysqli_query($conn, $sql_insert_hebergement);
            }

            // Duplicate vols related to the formule
            $sql_fetch_vols = "SELECT * FROM vols WHERE formule_id = $formule_id";
            $result_fetch_vols = mysqli_query($conn, $sql_fetch_vols);
            while ($row_vol = mysqli_fetch_assoc($result_fetch_vols)) {
                $ville_depart_id = $row_vol['ville_depart_id'];
                $compagnie_aerienne_id = $row_vol['compagnie_aerienne_id'];
                $num_vol = $row_vol['num_vol'];
                $airport_depart = $row_vol['airport_depart'];
                $heure_depart = $row_vol['heure_depart'];
                $destination = $row_vol['destination'];
                $airport_destination = $row_vol['airport_destination'];
                $heure_arrivee = $row_vol['heure_arrivee'];

                $sql_insert_vol = "INSERT INTO vols (formule_id, ville_depart_id, compagnie_aerienne_id, num_vol, airport_depart, heure_depart, destination, airport_destination, heure_arrivee)
                    VALUES ('$new_formule_id', '$ville_depart_id', '$compagnie_aerienne_id', '$num_vol', '$airport_depart', '$heure_depart', '$destination', '$airport_destination', '$heure_arrivee')";
                mysqli_query($conn, $sql_insert_vol);
            }

            echo "Formule and its associated vols and hebergements duplicated successfully";
            header("Location: display_formules.php"); // Redirect back to the form after successful duplication
            exit;
        } else {
            echo "Error duplicating formule: " . mysqli_error($conn);
        }
    } else {
        echo "Formule not found.";
    }
} else {
    echo "No formule ID provided.";
}

mysqli_close($conn);
?>
