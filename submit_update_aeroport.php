<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Vérifier si les données du formulaire ont été soumises
if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['abrv'])) {
    // Récupérer les données du formulaire
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $abrv = $_POST['abrv'];

    // Préparer et exécuter la requête SQL pour mettre à jour les données
    $sql = "UPDATE airports SET nom='$nom', abrv='$abrv' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Aeroport mise à jour avec succès.";
        header("Location: liste_aeroport.php"); // Redirect back to the form after successful insertion

    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Erreur: Données du formulaire manquantes.";
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>