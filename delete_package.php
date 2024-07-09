<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Vérifier si l'identifiant du package est passé en paramètre dans l'URL
if(isset($_GET['id'])) {
    $package_id = $_GET['id'];

    // Désactiver temporairement la vérification des clés étrangères
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

    // Requête SQL pour supprimer les entrées correspondantes dans la table formules
    $sql_formules = "DELETE FROM formules WHERE package_id = $package_id";
    if (mysqli_query($conn, $sql_formules)) {
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
        echo "Erreur lors de la suppression des formules : " . mysqli_error($conn);
    }

    // Réactiver la vérification des clés étrangères
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");

} else {
    echo "Identifiant du package non spécifié.";
}

// Fermer la connexion
$conn->close();
?>
