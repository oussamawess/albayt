<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Récupérer l'ID de la ville de départ à supprimer
$id = $_GET['id'];

// Préparer et exécuter la requête SQL pour supprimer les données
$sql = "DELETE FROM airports WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    header('location:liste_aeroport.php');
    echo "Aeroport supprimée avec succès.";
} else {
    echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
