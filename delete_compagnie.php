<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Récupérer l'ID de la compagnie à supprimer
$compagnie_id = $_GET['id'];

// Préparer la requête SQL pour supprimer la compagnie
$sql = "DELETE FROM compagnies_aeriennes WHERE id = $compagnie_id";

// Exécuter la requête
if ($conn->query($sql) === TRUE) {
    echo "La compagnie aérienne a été supprimée avec succès.";
    header("location:list_compagnies.php");
} else {
    echo "Erreur : " . $conn->error;
}

// Fermer la connexion
$conn->close();
?>
