<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Vérifier si l'identifiant du package est passé en paramètre dans l'URL
if (isset($_GET['id'])) {
    $package_id = $_GET['id'];

    // Désactiver temporairement la vérification des clés étrangères
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

    // Requête SQL pour supprimer les entrées correspondantes dans la table type_formule_omra
    $sql_delete_type_formule = "DELETE FROM type_formule_omra WHERE formule_parent_id = $package_id";
    if (mysqli_query($conn, $sql_delete_type_formule)) {

        // Récupérer les IDs des formules associées au package
        $sql_get_formules = "SELECT id FROM formules WHERE package_id = $package_id";
        $result_formules = mysqli_query($conn, $sql_get_formules);
        $formule_ids = [];
        if (mysqli_num_rows($result_formules) > 0) {
            while ($row = mysqli_fetch_assoc($result_formules)) {
                $formule_ids[] = $row['id'];
            }
        }

        // Supprimer les vols associés aux formules du package
        if (!empty($formule_ids)) {
            $formule_ids_str = implode(',', $formule_ids);
            $sql_delete_vols = "DELETE FROM vols WHERE formule_id IN ($formule_ids_str)";
            if (!mysqli_query($conn, $sql_delete_vols)) {
                echo "Erreur lors de la suppression des vols : " . mysqli_error($conn);
            }

            // Supprimer les hébergements associés aux formules du package
            $sql_delete_hebergements = "DELETE FROM hebergements WHERE formule_id IN ($formule_ids_str)";
            if (!mysqli_query($conn, $sql_delete_hebergements)) {
                echo "Erreur lors de la suppression des hébergements : " . mysqli_error($conn);
            }

            // Supprimer les formules associées au package
            $sql_delete_formules = "DELETE FROM formules WHERE id IN ($formule_ids_str)";
            if (!mysqli_query($conn, $sql_delete_formules)) {
                echo "Erreur lors de la suppression des formules : " . mysqli_error($conn);
            }
        }

        // Requête SQL pour supprimer le package de la base de données
        $sql_package = "DELETE FROM omra_packages WHERE id = $package_id";
        // Exécuter la requête
        if (mysqli_query($conn, $sql_package)) {
            // Rediriger l'utilisateur vers la liste des packages après la suppression
            header("Location: omrapackage.php");
            exit();
        } else {
            echo "Erreur lors de la suppression du package : " . mysqli_error($conn);
        }
    } else {
        echo "Erreur lors de la suppression des types de formules : " . mysqli_error($conn);
    }

    // Réactiver la vérification des clés étrangères
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");
} else {
    echo "Identifiant du package non spécifié.";
}

// Fermer la connexion
$conn->close();
?>
