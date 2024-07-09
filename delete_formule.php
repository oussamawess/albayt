<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Vérifier si l'identifiant de la formule est passé en paramètre dans l'URL
if(isset($_GET['id'])) {
    $formule_id = $_GET['id'];

    // Préparer la requête SQL pour supprimer la formule
    $sql = "DELETE FROM formules WHERE id = $formule_id";

    // Exécuter la requête pour supprimer la formule
    if ($conn->query($sql) === TRUE) {
        echo "Formule supprimée avec succès.";
    } else {
        echo "Erreur lors de la suppression de la formule : " . $conn->error;
    }
} else {
    echo "Identifiant de la formule non spécifié.";
}

// Rediriger vers la page précédente
header("Location: ".$_SERVER['HTTP_REFERER']);
?>
