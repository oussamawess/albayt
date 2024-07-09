<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Récupérer les données du formulaire
$nom = $_POST['nom'];

// Enregistrement du logo de la compagnie
$logo = '';
if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
    $tmpFilePath = $_FILES['logo']['tmp_name'];
    $newFilePath = "uploads/" . $_FILES['logo']['name'];
    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
        $logo = $newFilePath;
    } else {
        echo "Erreur lors de l'upload du logo.";
        exit();
    }
}

// Préparer la requête SQL pour ajouter la compagnie
$sql = "INSERT INTO compagnies_aeriennes (nom, logo) VALUES ('$nom', '$logo')";

// Exécuter la requête pour ajouter la compagnie
if ($conn->query($sql) === TRUE) {
    echo "La compagnie aérienne a été ajoutée avec succès.";
    // Redirection vers la page list_compagnies.php après succès
    header("Location: list_compagnies.php");
    exit();
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Fermer la connexion
$conn->close();
?>
