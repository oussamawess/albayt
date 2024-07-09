<?php
// Inclure le fichier de connexion à la base de données
include "db.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $target_file = ""; // Initialiser la variable target_file

    // Vérifier si une image a été téléchargée
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        // Chemin de téléchargement de l'image
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);

        // Déplacer l'image téléchargée vers le répertoire de téléchargement
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            echo "L'image " . basename($_FILES["photo"]["name"]) . " a été téléchargée avec succès.";
        } else {
            echo "Erreur lors du téléchargement de l'image.";
        }
    } else {
        echo "Aucune image sélectionnée.";
    }

    // Requête SQL pour insérer les données dans la table des packages Omra
    $sql = "INSERT INTO omra_packages (nom, description, photo) VALUES ('$nom', '$description', '$target_file')";

    // Exécuter la requête
    if ($conn->query($sql) === TRUE) {
        echo "Package Omra ajouté avec succès.";
        // Redirection vers la page omrapackage.php après succès
        header("Location: omrapackage.php");
        exit();
    } else {
        echo "Erreur lors de l'ajout du package Omra : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>
