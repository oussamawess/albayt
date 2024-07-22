<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Vérifier si l'identifiant de l'hôtel est passé en paramètre dans l'URL
if(isset($_GET['id'])) {
    $hotel_id = $_GET['id'];

    // Requête SQL pour supprimer l'hôtel de la base de données
    $sql = "DELETE FROM hotels WHERE id = $hotel_id";

    // Exécuter la requête pour supprimer l'hôtel
    if ($conn->query($sql) === TRUE) {
        // Redirection vers la liste des hôtels après la suppression
        header("Location: hotels.php");
        exit();
    } else {
        echo "Erreur lors de la suppression de l'hôtel : " . $conn->error;
    }
} else {
    echo "Identifiant de l'hôtel non spécifié.";
}
?>
