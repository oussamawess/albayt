<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];

    // Préparer la requête SQL d'insertion
    $sql = "INSERT INTO extras (nom, description, prix) VALUES ('$nom', '$description', '$prix')";

    // Exécuter la requête
    if (mysqli_query($conn, $sql)) {
        // Redirection vers une page de succès
        header("Location: list_extra.php");
        exit;
    } else {
        // En cas d'erreur lors de l'insertion, afficher un message d'erreur
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
