<?php
    session_start(); // Start session to access session variables
    
    // Check if user is not logged in, redirect to login page
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: login.php");
        exit;
    }
?>
<?php
include 'db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $package_id = intval($_GET['id']);

    // Step 1: Duplicate the Omra package
    $sql_duplicate_package = "INSERT INTO omra_packages (nom, description, photo, category_parent_id)
                          SELECT nom, description, photo, category_parent_id
                          FROM omra_packages
                          WHERE id = $package_id";

    if (mysqli_query($conn, $sql_duplicate_package)) {
        $new_package_id = mysqli_insert_id($conn);

        // Step 2: Duplicate formules for the new package
        $sql_duplicate_formules = "INSERT INTO formules (package_id, date_depart, date_retour, statut, duree_sejour, prix_chambre_quadruple, prix_chambre_triple, prix_chambre_double, prix_chambre_single, child_discount, prix_bebe, prix_chambre_quadruple_promo, prix_chambre_triple_promo, prix_chambre_double_promo, prix_chambre_single_promo, type_id, created_at, programs_id, program_order, description, s1t, s1d, s2t, s2d, s3t, s3d, s4t, s4d, s5t, s5d, uploaded_file, image_formule, statut_vol)
                                   SELECT $new_package_id, date_depart, date_retour, 'désactivé', duree_sejour, prix_chambre_quadruple, prix_chambre_triple, prix_chambre_double, prix_chambre_single, child_discount, prix_bebe, prix_chambre_quadruple_promo, prix_chambre_triple_promo, prix_chambre_double_promo, prix_chambre_single_promo, type_id, created_at, programs_id, program_order, description, s1t, s1d, s2t, s2d, s3t, s3d, s4t, s4d, s5t, s5d, uploaded_file, image_formule, statut_vol
                                   FROM formules
                                   WHERE package_id = $package_id";
        if (mysqli_query($conn, $sql_duplicate_formules)) {
            $new_formule_ids = [];
            $original_to_new_formule_ids = [];
            $type_id_map = [];

            // Step 3: Map original formules IDs to new formules IDs
            $sql_get_original_formules = "SELECT id, uploaded_file, type_id FROM formules WHERE package_id = $package_id";
            $result_original_formules = mysqli_query($conn, $sql_get_original_formules);
            if (mysqli_num_rows($result_original_formules) > 0) {
                while ($row_original_formule = mysqli_fetch_assoc($result_original_formules)) {
                    $original_formule_id = $row_original_formule['id'];
                    $original_uploaded_file = $row_original_formule['uploaded_file'];
                    $original_type_id = $row_original_formule['type_id'];
                    
                    // Fetch the new formule ID
                    $sql_get_new_formule = "SELECT id FROM formules WHERE package_id = $new_package_id";
                    if (!empty($new_formule_ids)) {
                        $sql_get_new_formule .= " AND id NOT IN (" . implode(",", $new_formule_ids) . ")";
                    }
                    $sql_get_new_formule .= " LIMIT 1";
                    $result_new_formule = mysqli_query($conn, $sql_get_new_formule);
                    if (mysqli_num_rows($result_new_formule) == 1) {
                        $row_new_formule = mysqli_fetch_assoc($result_new_formule);
                        $new_formule_id = $row_new_formule['id'];
                        $new_formule_ids[] = $new_formule_id;
                        $original_to_new_formule_ids[$original_formule_id] = $new_formule_id;

                        // Step 4: Duplicate type_formule_omra if necessary
                        if (!isset($type_id_map[$original_type_id])) {
                            $sql_duplicate_type_formule = "INSERT INTO type_formule_omra (nom, formule_parent_id)
                                                           SELECT nom, $new_package_id
                                                           FROM type_formule_omra
                                                           WHERE type_formule_omra.id = $original_type_id";
                            if (mysqli_query($conn, $sql_duplicate_type_formule)) {
                                $new_type_formule_id = mysqli_insert_id($conn);
                                $type_id_map[$original_type_id] = $new_type_formule_id;
                            }
                        }

                        // Update new formules with new type_formule_omra ID
                        if (isset($type_id_map[$original_type_id])) {
                            $new_type_formule_id = $type_id_map[$original_type_id];
                            $sql_update_new_formule = "UPDATE formules SET type_id = $new_type_formule_id WHERE id = $new_formule_id";
                            mysqli_query($conn, $sql_update_new_formule);
                        }

                        // Step 5: Copy uploaded file (photo) if exists
                        if (!empty($original_uploaded_file) && file_exists('files/' . $original_uploaded_file)) {
                            $new_photo_name = 'copy_' . basename($original_uploaded_file);
                            $new_photo_path = 'files/' . $new_photo_name;

                            if (copy('files/' . $original_uploaded_file, $new_photo_path)) {
                                // Update new formule with new photo path
                                $sql_update_photo = "UPDATE formules SET uploaded_file = '$new_photo_name' WHERE id = $new_formule_id";
                                mysqli_query($conn, $sql_update_photo);
                            }
                        }
                    }
                }
            }

            // Step 5: Duplicate Program_details vols and hebergements for the new formules
            foreach ($original_to_new_formule_ids as $original_formule_id => $new_formule_id) {
                $sql_duplicate_program_details = "INSERT INTO program_details (formule_id, program_id, date, duration)
                                                  SELECT $new_formule_id, program_id, date, duration
                                                  FROM program_details
                                                  WHERE formule_id = $original_formule_id";
                mysqli_query($conn, $sql_duplicate_program_details);

                $sql_duplicate_vols = "INSERT INTO vols (formule_id, ville_depart_id, compagnie_aerienne_id, num_vol, airport_depart_id, heure_depart, ville_destination_id, airport_destination_id, heure_arrivee)
                                       SELECT $new_formule_id, ville_depart_id, compagnie_aerienne_id, num_vol, airport_depart_id, heure_depart, ville_destination_id, airport_destination_id, heure_arrivee
                                       FROM vols
                                       WHERE formule_id = $original_formule_id";
                mysqli_query($conn, $sql_duplicate_vols);

                $sql_duplicate_hebergements = "INSERT INTO hebergements (formule_id, hotel_id, type_pension, date_checkin, date_checkout, nombre_nuit)
                                               SELECT $new_formule_id, hotel_id, type_pension, date_checkin, date_checkout, nombre_nuit
                                               FROM hebergements
                                               WHERE formule_id = $original_formule_id";
                mysqli_query($conn, $sql_duplicate_hebergements);
            }

            // echo "Le package a été dupliqué avec succès.";
            header("Location: omrapackage.php");
                exit();
        } else {
            echo "Erreur lors de la duplication des formules: " . mysqli_error($conn);
        }
    } else {
        echo "Erreur lors de la duplication du package: " . mysqli_error($conn);
    }
} else {
    echo "ID de package non spécifié ou invalide.";
}

mysqli_close($conn);
?>
